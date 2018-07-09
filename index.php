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

echo 'all was done.';