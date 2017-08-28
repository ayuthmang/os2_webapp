<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS447 Operation System 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
</head>
<body>
    <div class="container">
      <h1 class="title">
        Members
      </h1>
      <?php
        require "query.php";

        $members = readMembers();

        if($members->num_rows > 0) {
            while($row = $members->fetch_assoc()) {
                echo '
                    <div class="box">
                        <article class="media">
                          <figure class="media-left">
                            <p class="image is-64x64">
                              <img src="'. $row['imageURL'].'">
                            </p>
                          </figure>
                          <div class="media-content">
                            <div class="content">
                              <p>
                                <strong>'. $row['firstname']. ' '. $row['lastname']. '</strong> <small>@'. $row['nickname'].'</small>
                              </p>
                            </div>
                          </div>
                        </article>
                    </div>
                ';
            }
        }
      ?>
    </div>
</body>
</html>
