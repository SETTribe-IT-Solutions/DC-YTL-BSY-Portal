<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Responsive Footer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .footer {
      background: #113e5c;
      color: #fff;
      padding: 10px 15px;
      text-align: center;
      margin-top: 50px;
    }

    .footer p {
      margin: 5px 0;
      font-size: 1rem;
      line-height: 1.4;
      word-wrap: break-word;
    }
    a{
        color: yellow;
    }

    @media (max-width: 600px) {
      .footer p {
        font-size: 0.9rem;
        padding: 0 10px;
      }
      .footer{
        margin-top: 60px;
      }
    }
  </style>
</head>
<body>
  <div class="footer">
    <p>© Copyright बालसंगोपन योजना - जिल्हाधिकारी कार्यालय, यवतमाळ</p>
    <p>Developed & Maintained by <a href = "https://settribe.com/">SETTribe IT Solutions</a></p>
  </div>
</body>
</html>
