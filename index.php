<?php
include ( 'PdfToText-master/PdfToText.phpclass' ) ;

$file = 'pdf/working.pdf';

$pdf		=  new PdfToText ( "$file", PdfToText::PDFOPT_DECODE_IMAGE_DATA ) ;
$image_count 	=  count ( $pdf -> Images ) ;

if  ( $image_count )
{
    for  ( $i = 0 ; $i  <  $image_count ; $i ++ )
    {
        $img		=  $pdf -> Images [$i] ;			// This is an object of type PdfImage
        $imgindex 	=  sprintf ( "%02d", $i + 1 ) ;
        $output_image	=  "$file.$imgindex.jpg" ;
        $img -> SaveAs ( $output_image ) ;
        ;
    }
}
$im = imagecreatefromjpeg('pdf/test.jpg');
$imLogo = imagecrop($im, ['x' => 20, 'y' => 75, 'width' => 295, 'height' => 295]);
if ($imLogo !== FALSE) {
    imagepng($imLogo, 'logo.png');
    imagedestroy($imLogo);
}

$imIsland = imagecrop($im, ['x' => 640, 'y' => 70, 'width' => 400, 'height' => 370]);
if ($imIsland !== FALSE) {
    imagepng($imIsland, 'island.png');
    imagedestroy($imIsland);
}

$imHeader = imagecrop($im, ['x' => 1325, 'y' => 150, 'width' => 654, 'height' => 125]);
if ($imHeader !== FALSE) {
    imagepng($imHeader, 'header.png');
    imagedestroy($imHeader);
}

echo 'all was done.';