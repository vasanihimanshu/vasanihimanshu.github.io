<?php
$binary = "/usr/local/bin/prince";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $content = $_POST['content'];
  $file = "/tmp/doc.html";
  $sf = fopen($file, 'w');
  fwrite($sf, $content);
  fclose($sf);
  exec($binary." /tmp/doc.html -o out.pdf");
  header('Location: /out.pdf');
} else {
	echo '
<html>
<head>
<title>Convert</title>
<style>
textarea {
  width: 500px;
  height: 300px;
}
</style>
</head>
<body>
	<textarea name="content" form="princeForm">Enter text here...</textarea>
        <form method="POST" action="/convert.php" id="princeForm">
        <input type="submit" value="Convert to PDF"></input>
        </form>
</body>
</html>
	';
}
?>
