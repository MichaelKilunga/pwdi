<?php
      // Include this function for resizing and padding the image
function resizeAndPadImage($sourcePath, $destinationPath, $newWidth, $newHeight, $backgroundColor = [255, 255, 255]) {
  // Get original image dimensions and type
  list($originalWidth, $originalHeight, $imageType) = getimagesize($sourcePath);
  
  // Calculate new dimensions while preserving the aspect ratio
  $originalRatio = $originalWidth / $originalHeight;
  $targetRatio = $newWidth / $newHeight;
  
  if ($originalRatio > $targetRatio) {
      $resizeWidth = $newWidth;
      $resizeHeight = intval($newWidth / $originalRatio);
  } else {
      $resizeHeight = $newHeight;
      $resizeWidth = intval($newHeight * $originalRatio);
  }
  
  // $resizeHeight = intval($newWidth / $originalRatio);

  
  // Create new blank canvas with desired dimensions
  $newImage = imagecreatetruecolor($newWidth, $newHeight);
  
  // Fill canvas with background color
  $bgColor = imagecolorallocate($newImage, $backgroundColor[0], $backgroundColor[1], $backgroundColor[2]);
  imagefill($newImage, 0, 0, $bgColor);
  
  // Load original image
  switch ($imageType) {
      case IMAGETYPE_JPEG:
          $originalImage = imagecreatefromjpeg($sourcePath);
          break;
      case IMAGETYPE_PNG:
          $originalImage = imagecreatefrompng($sourcePath);
          break;
      case IMAGETYPE_GIF:
          $originalImage = imagecreatefromgif($sourcePath);
          break;
      default:
          return false;
  }
  
 // Center horizontally
$xOffset = ($newWidth - $resizeWidth) / 2;
// Align to the bottom
$yOffset = $newHeight - $resizeHeight;

  
  // Copy resized image onto the canvas
  imagecopyresampled($newImage, $originalImage, $xOffset, $yOffset, 0, 0, $resizeWidth, $resizeHeight, $originalWidth, $originalHeight);
  
  // Save the new image to the destination path
  switch ($imageType) {
      case IMAGETYPE_JPEG:
          imagejpeg($newImage, $destinationPath, 100);
          break;
      case IMAGETYPE_PNG:
          imagepng($newImage, $destinationPath);
          break;
      case IMAGETYPE_GIF:
          imagegif($newImage, $destinationPath);
          break;
  }
  
  // Clean up
  imagedestroy($newImage);
  imagedestroy($originalImage);
  
  return true;
}

function compressImage($sourcePath, $destinationPath, $maxSize = 1048576, $quality = 90) {
  // Get image information
  list($width, $height, $imageType) = getimagesize($sourcePath);

  // Load the image based on its type
  switch ($imageType) {
      case IMAGETYPE_JPEG:
          $image = imagecreatefromjpeg($sourcePath);
          break;
      case IMAGETYPE_PNG:
          $image = imagecreatefrompng($sourcePath);
          break;
      case IMAGETYPE_GIF:
          $image = imagecreatefromgif($sourcePath);
          break;
      default:
          return false; // Unsupported image type
  }

  // Save the image with adjusted quality
  do {
      // Temporarily save the compressed image
      ob_start(); // Start output buffering
      switch ($imageType) {
          case IMAGETYPE_JPEG:
              imagejpeg($image, null, $quality); // Save as JPEG
              break;
          case IMAGETYPE_PNG:
              $compression = (int)((100 - $quality) / 10); // Convert quality to PNG compression
              imagepng($image, null, $compression); // Save as PNG
              break;
          case IMAGETYPE_GIF:
              imagegif($image, null); // Save as GIF
              break;
      }
      $compressedImage = ob_get_clean(); // Get the compressed image content

      // Check the size of the compressed image
      $currentSize = strlen($compressedImage);
      $quality -= 5; // Reduce quality for next iteration if needed
  } while ($currentSize > $maxSize && $quality > 10); // Stop if size is under maxSize or quality is too low

  // Write the compressed image to the destination path
  file_put_contents($destinationPath, $compressedImage);

  // Clean up
  imagedestroy($image);

  return true;
}

// // Usage example
// $tempPath = $_FILES['file']['tmp_name'];
// $destinationPath = '../slides/compressed_image.jpg';

// if (compressImage($tempPath, $destinationPath)) {
//   echo "Image compressed and saved successfully.";
// } else {
//   echo "Image compression failed.";
// }

?>