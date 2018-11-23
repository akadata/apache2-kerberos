<!DOCTYPE html>
<html>

<head lang="en-US">
  <meta charset="utf-8"/>
  <link href="data:image/x-icon;base64,AAABAAEADxAAAAEAIAAoBAAAFgAAACgAAAAPAAAAIAAAAAEAIAAAAAAAwAMAABILAAASCwAAAAAAAAAAAAD///////7+///////y7e3/+vf4/////////////////////////////////////////////////////////////v7+///////u5+j/7ubp///////+/v7////////////////////////////////////////////////////////////69/n/7N3m///////+/f7/////////////////////////////////////////////////////////////////38nd//Dm7////////v7///////////////////////////////////////////////////7+/v//////vpXA/4Y5iv+9k8D///////79/v////////////////////////////////////////////38/v//////vpnH/3MwnP+ETq//8Oj0///////+/v7///////////////////////////////////////39/v//////2Mjn/2o4tP9UI7P/lnrS///////+/f7///////////////////////////////////////7+////////8/D6/2g/vv9cNb//PRO6/9TN8f///////f3+///////////////////////////////////////9/P7//////4Vs1P9SMcf/NBbF/5GD4f///////Pz+///////////////////////////////////////9/f7//////8i/7/9BKcz/QizP/0040v/z8fz///////7+/////////////////////////////////////////v7///////9nVdn/RTTS/yogzv+yru3///////z8/v///////////////////////////////////////f3////////GwfL/PEfY/zNV3P9wjej///////39/v////////////////////////////////////////////39////////eJPq/zFj4v8mZ+X/ytz5///////9/f////////////////////////////////////////7+////////6e78/0CF7P8Vf+//f7b1////+f/8/f/////////////////////////////////////////////8/v///////8Ph/P8Qkvf/dLr3////+f/8/v///////////////////////////////////////////////////f7///////+02/z/1On9///////+/v////////////8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon"/>
  <title>Web server</title>
  <meta name="description" content="Apache2 server as Proxy in front of web server"/>
</head>

<body>

<style type="text/css">
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th {
  text-align: left;
}
th, td:first-child {
  background-color: lightgrey;
  min-width: 300px;
}; 
</style>

<h1>Apache2 server as Proxy in front of web server</h1>

<p>
This web page required valid Kerberos authentication, thanks to
Negotiate protocol in other words SPNego based on Kerberos.<br>
Apache2 proxy server uses <a href="http://modauthkerb.sourceforge.net" target="_blank">mod_auth_kerb</a>.
</p>

<p>See:</p>

<ul>
  <li><a href="https://www.chromium.org/developers/design-documents/http-authentication" target="_blank">HTTP authentication</a></li>
  <li><a href="https://msdn.microsoft.com/en-us/library/ms995330.aspx" target="_blank">Negotiate protocol</a></li>
  <li><a href="https://tools.ietf.org/html/rfc4559" target="_blank">rfc4559</a></li>
</ul>

<table>
<tr>
  <th colspan="2">Request headers</th>
</tr>
<?php
foreach (getallheaders() as $name => $value) {
    echo "<tr><td><b>$name</b></td> <td>$value</td></tr>\n";
}
?>
</table>

</body>

</html>
