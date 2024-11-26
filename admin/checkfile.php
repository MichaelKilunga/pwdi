<!DOCTYPE html>
<html>

<head>
    <title>File Validation-1</title>


    <script>
        Filevalidation = () => {
            const fi = document.getElementById('file');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {

                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    if (file >= 4096) {
        //                 alert(
        // "File too Big, please select a file less than 4mb");
                        document.getElementById('size').innerHTML = 
                          '<b>'+ file + '</b> KB';
                    } else if (file < 2048) {
        //                 alert(
        // "File too small, please select a file greater than 2mb");
                        document.getElementById('size').innerHTML = 
                          '<b>'+ file + '</b> KB';
                    }
                    else {
                        document.getElementById('size').innerHTML = 
                          '<b>'+ file + '</b> KB';
                    }
                }
            }
        }
    </script>
    </head>

<body>
    <p>
        <form method="POST" action="">
        <input type="file" id="file" 
               onchange="Filevalidation()" />
               <button name="submit" type="submit">UPLOAD</button>
           </form>
    </p>
    <p id="size"></p>
    <input type="text" name="file" id="size">

</body>

</html>

