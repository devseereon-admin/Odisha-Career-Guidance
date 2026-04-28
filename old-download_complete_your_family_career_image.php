<?php

// Load the base image (tree.png)
$base_image = imagecreatefrompng('img/Tree-02-0005.png');
// $base_image = imagecreatefrompng('img/Career-Tree-cl44.png');

// Set text color (white) and font
$text_color = imagecolorallocate($base_image, 255, 255, 255); // white color
$font_path = './Arial.ttf'; // Path to your font file (adjust as necessary)

// Set font size and line height
$font_size = 10;
$line_height = 14; // Adjust as needed to control spacing between lines

// Define function to create text block with green background and padding
function addTextBlock($image, $text, $x, $y, $fontPath, $fontSize, $lineHeight, $textColor, $padding = 0) {
    $lines = explode("\n", $text); // Split text into lines
    $maxWidth = 0;
    $totalHeight = count($lines) ;

    // Calculate the maximum width needed for the text block
    foreach ($lines as $line) {
        $bbox = imagettfbbox($fontSize, 0, $fontPath, $line);
        $lineWidth = $bbox[2] - $bbox[0]; // Calculate line width
        if ($lineWidth > $maxWidth) {
            $maxWidth = $lineWidth;
        }
    }

    // Define background rectangle dimensions with padding
    $bgWidth = $maxWidth + 2 * $padding; // Add left and right padding
    $bgHeight = $totalHeight + 2 * $padding; // Add top and bottom padding

    // Create green background with padding
    $bgColor = imagecolorallocate($image, 0, 128, 0); // green color
    imagefilledrectangle($image, $x, $y, $x + $bgWidth, $y + $bgHeight, $bgColor);

    // Add text to the image with padding
    foreach ($lines as $line) {
        // Calculate text position with padding
        $textX = $x + $padding; // X-coordinate for text (left padding)
        $textY = $y + $padding; // Y-coordinate for text (top padding)

        // Add text to the image
        imagettftext($image, $fontSize, 0, $textX, $textY, $textColor, $fontPath, $line);

        // Move to the next line (increment Y-coordinate by line height)
        $y += $lineHeight;
    }
}

// Define positions for each block based on a layout
$positions = [
    ['x' => 390, 'y' => 50],
    ['x' => 180, 'y' => 130],
    ['x' => 340, 'y' => 130],
    ['x' => 520, 'y' => 120],
    ['x' => 590, 'y' => 180],
    ['x' => 140, 'y' => 180],
    ['x' => 340, 'y' => 190],
    ['x' => 260, 'y' => 250],
    ['x' => 490, 'y' => 255],
    ['x' => 80, 'y' => 310],
    ['x' => 520, 'y' => 310],
    
    ['x' => 100, 'y' => 400],
    ['x' => 620, 'y' => 400]
];
$prefix = [ "Me","Mother's Career", "Father's Career","Brother/Cousin's Career", "Sister/Cousin's Career","P. Uncle's Career","P. Aunt's Career", "M. Uncle's Career","M. Aunt's Career", "P. Grandfather's Career","P. Grandmother's Career", "M. Grandfather's Career","M. Grandmother's Career"];

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add text blocks to the image for each block of content
    foreach ($positions as $key => $position) {
        $postKey = 'content' . ($key + 1);
        if (isset($_POST[$postKey]) && !empty($_POST[$postKey])) {
            // Combine prefix and posted data with a newline
            $text = $prefix[$key] . ":\n" . $_POST[$postKey];
            $x = $position['x']; // X-coordinate for the content block
            $y = $position['y']; // Y-coordinate for the content block
    
            // Add text block with green background and padding to the image
            addTextBlock($base_image, $text, $x, $y, $font_path, $font_size, $line_height, $text_color, $padding = 20);
        }
    }

    // Set the appropriate headers for PNG image
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="generated_image.png"');

    // Output the modified image
    imagepng($base_image);

    // Clean up resources
    imagedestroy($base_image);
} else {
    // Handle invalid form submission or direct access
    echo "Invalid request.";
}
?>
