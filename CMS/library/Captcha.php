<?php
class Captcha{
    private $width = 80, $height = 75, $gd_image, $char_count;
    private $deform_image = true, $deform_poles = 3;
    private $captcha_text, $charset = 'ABCDEFGHIJKLMOPQRSTUVWXYZ0123456789';
    private $bg_color;


    public function __construct($width = 140, $height = 60, $bg_color = '#FFF') {
        $this->width = $width;
        $this->height = $height;
        $this->gd_image = imagecreate($width, $height);
        $this->hex2color($bg_color);
        $this->bg_color = $bg_color;
    }
    
    private function hex2color($hex_color){
        $hex_color = substr($hex_color, 1);
        $rgb = array();
        
        foreach(str_split($hex_color, strlen($hex_color) === 6 ? 2 : 1) as $c){
            if(strlen($c) === 1)
                $c .= $c;
            $rgb[] = hexdec($c);
        }
        
        return imagecolorallocate($this->gd_image, $rgb[0], $rgb[1], $rgb[2]);
    }
    
    public function setDeformCaptcha($on = true, $poles = 3){
        $this->deform_image = $on;
        $this->deform_poles = $poles;
    }
    
    private function deformImage(){
        $poles_x = $poles_y = $poles_r = array();
        $img_d = sqrt($this->width * $this->width + $this->height * $this->height);
        
        for($i = 0; $i < $this->deform_poles; $i++){
            $poles_x[] = mt_rand($this->width * .1, $this->width * .9);
            $poles_y[] = mt_rand($this->height * .1, $this->height * .9);
            $poles_r[] = mt_rand($img_d / 40, $img_d / 2);
        }
        
        $old_image = $this->gd_image;
        $this->gd_image = imagecreate($this->width, $this->height);
        imagepalettecopy($this->gd_image, $old_image);
        
        for($xi = 0; $xi < $this->width; $xi++){
            for($yi = 0; $yi < $this->height; $yi++){
                $pxl_x = $xi;
                $pxl_y = $yi;
                
                for($i = 0; $i < $this->deform_poles; $i++){
                    $pole_x = $poles_x[$i];
                    $pole_y = $poles_y[$i];
                    $pole_r = $poles_r[$i];
                    
                    $dx = abs($pxl_x - $pole_x);
                    $dy = abs($pxl_y - $pole_y);
                    $d = sqrt($dx * $dx + $dy * $dy);
                    
                    if($d > $pole_r)
                        continue;
                    
                    $coef = sin(pi() * $d / $pole_r) * .1;
                    $pxl_x += ($pole_x - $pxl_x) * $coef;
                    $pxl_y += ($pole_y - $pxl_y) * $coef;
                }
                
                imagesetpixel($this->gd_image, $pxl_x, $pxl_y, imagecolorat($old_image, $xi, $yi));
            }
        }
        
        imagedestroy($old_image);
    }
    
    public function generate($char_count = 6){
        $this->captcha_text = $this->str_aleat($char_count);
        $this->char_count = $char_count;
        $this->generateImageText();
        
        if($this->deform_image)
            $this->deformImage();
        
        return $this->captcha_text;
    }
    
    private function str_aleat($size){
        $ret = '';
        
        for($i = 0; $i < $size; $i++){
            $rand = mt_rand(0, strlen($this->charset) - 1);
            $ret .= substr($this->charset, $rand, 1);
        }
        
        return $ret;
    }
    
    private function generateImageText(){
        $interval_size = $this->width / $this->char_count - 1;
        $x = 0;
        foreach(str_split($this->captcha_text) as $chr){
            $chr_x = mt_rand($x + $interval_size * .4, $x + $interval_size * .8);
            $chr_y = mt_rand($this->height * .4, $this->height * .8);
            
            $r = mt_rand(0, 255);
            $g = mt_rand(0, 255);
            $b = mt_rand(0, 255);
            $color = imagecolorallocate($this->gd_image, $r, $g, $b);
            imagettftext($this->gd_image, rand(18, 26), rand(0, 45), $chr_x, $chr_y, $color, __DIR__.'/police.ttf', $chr);
            $x += $interval_size;
        }
    }
    
    public function show(){
        imagepng($this->gd_image);
    }
}
