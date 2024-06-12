<!-- Utilização do PHP 7.4 -->
<?php

require_once('bd.php');

$site_dados = $pdo->query("SELECT * FROM site")->fetch();

?>
<!-- Utilização do HTML 5-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Utilização do Bootstrap 4.6 -->
    <link href=Bootstrap_css_4.6/bootstrap.min.css rel="stylesheet" type="text/css">
    <!-- Utilização do JQuery 3.5.1-->
    <script src="./js/bootstrap.min.js"></script>
    <title><?=$site_dados['titulo']?></title>
    <!-- Utilização do CSS 3-->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Times New Roman', Times, serif;
        }
        
        #banner {
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            font-size: 1.5em;
            height: 150px;
            padding-top: 70px;
        }

        #sobre {
            width: 80%;
            margin: 50px auto;
            background-color: #f9f9f9;
            text-align: center;
            border: 1px solid #ccc;
            padding-top: 20px;
        }

        #contato {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
        }

        #contato input, #contato textarea {
            width: 95%;
            padding: 15px;
            border: 1px solid #ccc;
            outline: none;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        #contato button {
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border: none;
            cursor: pointer;
            font-size: 1.1em;
        }

        #contato button:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
        }

        nav {
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #555;
            color: #fff;
            text-align: center;
        }

        nav ul {
            list-style: none;
        }

        nav li {
            margin: 10px;
            display: inline-block;
        }

        nav a {
            color:#fff;
            text-decoration: none;
        }
        /*Responsividade para dispositivos com até no maximo 500 pixels de tela*/
        @media screen and (max-width: 500px) {
            #banner {
                width: 100%;
                background-color: #333;
                color: #fff;
                text-align: center;
                font-size: 1.5em;
                height: 200px;
                padding-top: 50px;
            }

            #sobre {
                width: 95%;
                margin: 50px auto;
                background-color: #f9f9f9;
                text-align: center;
                border: 1px solid #ccc;
                padding-top: 20px;
            }

            #contato {
                width: 95%;
                margin: 50px auto;
                padding: 20px;
                background-color: #f9f9f9;
                border: 1px solid #ccc;
                text-align: center;
            }

            h2 {
                margin-bottom: 25px;
            }

            #contato input, #contato textarea {
                width: 95%;
                padding: 15px;
                border: 1px solid #ccc;
                outline: none;
                margin-top: 10px;
                margin-bottom: 20px;
            }

            #contato button {
                background-color: #4CAF50;
                color: white;
                padding: 15px 25px;
                border: none;
                cursor: pointer;
                font-size: 1.1em;
            }

            #contato button:hover {
                background-color: #45a049;
            }

            footer {
                background-color: #333;
                color: #fff;
                text-align: center;
                padding: 15px;
            }

            nav {
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #555;
                color: #fff;
                text-align: center;
            }

            nav ul {
                list-style: none;
            }

            nav li {
                margin: 10px;
                display: inline-block;
            }

            nav a {
                color:#fff;
                text-decoration: none;
            }
        }
    </style>
</head>
<body>
    
    <nav>
        <li><a href="#banner">Home</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <li><a href="#contato">Contato</a></li>
    </nav>

    <section id="banner">
        <h1><?= $site_dados['banner'] ?></h1>
    </section>

    <section id="sobre">
        <h2>Sobre</h2>
        <p><?= $site_dados['sobre'] ?></p>
    </section>

    <section id="contato">
        <h2>Contato</h2>
        <form method="post">
        <form method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required/>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required/>
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </section>

    <footer>
        <p><?=date("Y")?>, <?=$site_dados['titulo']?></p>
    </footer>

    <script>
        const form = document.querySelector("#contato form");
        
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const dados = new FormData(form);

            fetch('enviar_contato.php', {
                method: 'POST', body: dados
            }).then((response) => {
                if (response.ok)
                    return response.text();
                throw new Error("Falha ao Enviar Mensagem!");
            }).then((data) => {
                alert(data);
                form.reset();
            }).cathc((error) => {
                alert(error.message);
            })
        })
    </script>
</body>
</html>