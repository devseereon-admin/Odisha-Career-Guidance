<?php

// Load the base image (tree.png)
$base_image = imagecreatefrompng('img/Tree-02-0005.jpg');

// Set text color (white) and font
$text_color = imagecolorallocate($base_image, 255, 255, 255); // white color
$font_path = './Arial.ttf'; // Path to your font file (adjust as necessary)

// Set font size and line height
$font_size = 10;
$line_height = 20; // Adjust as needed to control spacing between lines

// Define function to create text block with green background and padding
function addTextBlock($image, $text, $x, $y, $fontPath, $fontSize, $lineHeight, $textColor, $padding = 10) {
    $lines = explode("\n", $text); // Split text into lines
    $maxWidth = 0;
    $totalHeight = count($lines) * $lineHeight;

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
    ['x' => 420, 'y' => 25],
    ['x' => 290, 'y' => 100],
    ['x' => 560, 'y' => 100],
    ['x' => 195, 'y' => 190],
    ['x' => 450, 'y' => 180],
    ['x' => 600, 'y' => 260],
    ['x' => 300, 'y' => 270],
    ['x' => 160, 'y' => 350],
    ['x' => 490, 'y' => 345],
    ['x' => 100, 'y' => 450],
    ['x' => 620, 'y' => 450]
];
$prefix = ["Brother/Sister's Career", "Me", "Brother/Sister's Career","Uncle's/Aunt's Career", "Mother's Career", "Father's Career","Uncle's/Aunt's Career", "Grandmother's Career", "Grandfather's Career","Grandmother's Career", "Grandfather's Career"];
// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve content for each block
    $content = [];
    for ($i = 1; $i <= 11; $i++) {
        $content[] = $prefix[$i-1]." : " .$_POST['content'.$i];
    }

    // Add text blocks to the image for each block of content
    foreach ($content as $key => $text) {
        $x = $positions[$key]['x']; // X-coordinate for the content block
        $y = $positions[$key]['y']; // Y-coordinate for the content block

        // Add text block with green background and padding to the image
        addTextBlock($base_image, $text, $x, $y, $font_path, $font_size, $line_height, $text_color, $padding = 20);
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
