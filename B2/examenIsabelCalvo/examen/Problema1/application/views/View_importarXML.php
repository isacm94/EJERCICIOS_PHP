<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="single-product-area">
            <div class="zigzag-bottom"></div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" action="<?= site_url() . '/Ctrl_index/ProcesaArchivo' ?>" enctype="multipart/form-data">
                        <input type="file" name="archivo" class="add_to_cart_button" /><br />
                        <input type="submit" value="Enviar" />
                    </form>            
                    
                    <?=$mensaje?>
                </div>
            </div>
        </div>
    </body>
</html>

