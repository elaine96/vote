<?php
	class Vcode{
		private $width;
		private $height;
		private $num;
		private $code;
		private $img;
		function __construct($width=80,$height=40,$num=4){
			$this->width=$width;
			$this->height=$height;
			$this->num=$num;
			$this->code=$this->createcode();
		}
		function getcode(){
			return $this->code;
		}
		function outimg(){ 
			$this->createback();
			$this->outstring();
			$this->setdisturbcolor();
			$this->printimg();
		}
		private function createback(){
			$this->img=imagecreatetruecolor($this->width, $this->height);
			$bgcolor=imagecolorallocate($this->img,rand(225,255), rand(225,255), rand(225,255));
			imagefill($this->img, 0, 0, $bgcolor);
			$bordercolor=imagecolorallocate($this->img, 51, 153, 255);
			imagerectangle($this->img, 0, 0, $this->width-1, $this->height-1, $bordercolor);
			
		}
		private function outstring(){
			for ($i=0; $i<$this->num; $i++) { 
				$color=imagecolorallocate($this->img,rand(0,128), rand(0,128), rand(0,128));
				$fontsize=rand(70,72);
				$x=3+$this->width/$this->num*$i;
				$y=rand(0,imagefontheight($fontsize)-3);
				imagechar($this->img, 72, $x, $y, $this->code{$i}, $color);
			}
		}
		private function setdisturbcolor(){
			for ($i=0; $i < 90; $i++) { 
				$color=imagecolorallocate($this->img,rand(0,255), rand(0,255), rand(0,255));
				imagesetpixel($this->img, rand(1,$this->width-2), rand(1,$this->height-2), $color);
			}
			for ($i=0; $i < 10; $i++) { 
				$color=imagecolorallocate($this->img,rand(128,225), rand(128,225), rand(128,225));
				imagearc($this->img, rand(-10,$this->width+10), rand(-10,$this->height+10), rand(30,300), rand(30,300), 55, 44, $color);
			}

		}
		private function printimg(){
			if (function_exists("imagegif")) {
				header("Content-Type:images/gif");
				imagegif($this->img);
			}
			elseif (function_exists("imagejpeg")) {
				header("Content-Type:images/jpeg");
				imagejpeg($this->img);
			}
			elseif (function_exists("imagepng")) {
				header("Content-Type:images/png");
				imagepng($this->img);
			}
			elseif (function_exists("imagewbmp")) {
				header("Content-Type:images/vnd.wap.wbmp");
				imagewbmp($this->img);
			}
			else{
				die("No image support in this PHP server");
			}
		}
		private function createcode(){
			$codes="345678abdefghijmnrtuyABDEFGHIJLMNQRTUY";
			$code="";
			for ($i=0; $i<$this->num; $i++) { 
				$code.=$codes{rand(0,strlen($codes)-1)};
			}
			return $code;
		}
		// private __destruct(){
		// 	imagedestroy($this->img);
		// }
	}


?>