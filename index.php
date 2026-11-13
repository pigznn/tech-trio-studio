<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$ok = 0;
if(isset($_POST['email'])){

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/phpmailer/PHPMailer.php';
require 'vendor/phpmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    // Pegar informações do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];
    
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contato.techtriostudio@gmail.com';                     //SMTP username
    $mail->Password   = 'fvvwpxqtyqeinqec';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contato.techtriostudio@gmail.com', 'Tech Trio Studio'); // Quem dispara o e-mail
    $mail->addAddress('mundoprehistocico@gmail.com', 'André');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = "
        Nome: $nome <br>
        E-Mail: $email <br>
        Assunto: $assunto <br>
        Mensagem: $mensagem
    ";
    $mail->AltBody = "
        Nome: $nome \n
        E-Mail: $email \n
        Assunto: $assunto \n
        Mensagem: $mensagem
    ";

    $mail->send();
    $ok = 1;
} catch (Exception $e) {
    $ok = 2;
}

}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Descrição do Site -->
    <meta name="description"
        content="A Tech Trio Studio cria sites modernos, rápidos e personalizados para destacar sua marca e impulsionar resultados no digital.">

    <!-- Palavras Chave -->
    <meta name="keywords"
        content="criação de sites, desenvolvimento web, design responsivo, agência digital, sites personalizados, UX UI design, identidade visual, marketing digital, presença online, tecnologia digital">

    <!-- Autor do Site -->
    <meta name="author" content="TECH TRIO STUDIO">

    <!-- Open Graph (Compartilhar no Whats, Face, X, LinkedIn) -->
    <meta property="og:title" content="Tech Trio Studio">
    <meta property="og:description" content="A Tech Trio Studio cria sites modernos, rápidos e personalizados para destacar sua marca e impulsionar resultados no digital.">
    <meta property="og:image" content="assets/logo.img.png">
    <meta property="og:type" content="website">


    <!-- Link dos icons para favicon -->

    <link rel="apple-touch-icon" sizes="57x57" href="assets/icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">



    <title>TechTrioStudio</title>

    <!-- RESET LIMPA OS ESTILOS DO HTML, E RESETA O 
     PADRÃO DOS NAVEGADORES PARA QUE NÃO HAJA 
     DIVERGÊNCIA QUANDO CARREGAR O SITE -->
    <link rel="stylesheet" href="css/reset.css">

    <!-- Biblioteca FONTAWESOME para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- <link rel="stylesheet" type="text/css" href="css/slick.css" />
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css" /> -->

    <link rel="stylesheet" href="css/accordion.min.css">
    
    <!-- LOCOMOTIVE SCROLL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@5.0.1/dist/locomotive-scroll.css">

    <!-- APLICA TODOS OS ESTILOS DO HTML -->
    <link rel="stylesheet" href="css/style.css">

    <!-- ANIMAÇÃO SLICK -->

    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <!-- ANIMAÇÃO - ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <!---- TOPO FLUTUANTE (LOGO + MENU) ---->
    <header class="topo" id="topo">
        <div class="topo-conteudo">
            <!---- LOGO ---->
            <a href="#home" class="logo">Tech Trio Studio</a>

            <!---- MENU ---->
            <nav class="menu">
                <span class="menu-indicador" aria-hidden="true"></span>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#servicos">Serviços</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!---- HERO PARALLAX ---->
    <!-- camadas do fundo para a frente; data-depth = quanto cada uma se move -->
    <section id="home" class="hero">
        <div class="hero-palco">
            <div class="hero-camada hero-ceu-topo" data-depth="0.08" aria-hidden="true"></div>
            <img class="hero-camada" src="assets/camadas/1080p/ceu.png" data-depth="0.08" alt="" fetchpriority="high">
            <img class="hero-camada" src="assets/camadas/1080p/montanhas-fundo.png" data-depth="0.18" alt="">
            <img class="hero-camada" src="assets/camadas/1080p/nuvens-meio.png" data-depth="0.32" alt="">

            <h1 class="hero-titulo hero-camada" data-depth="0.38">
                <span class="hero-titulo-te">Te</span><span class="hero-titulo-ch">ch</span> <span class="hero-titulo-trio">trio</span>
            </h1>

            <img class="hero-camada" src="assets/camadas/1080p/triangulo.png" data-depth="0.45" alt="">
            <img class="hero-camada" src="assets/camadas/1080p/montanha-principal.png" data-depth="0.6" alt="">
            <img class="hero-camada" src="assets/camadas/1080p/personagens.png" data-depth="0.66" data-rolagem="0.6" alt="Os três integrantes da Tech Trio Studio no topo de uma montanha">
            <img class="hero-camada" src="assets/camadas/1080p/nuvens-frente.png" data-depth="1" alt="">
        </div>
    </section>

    <!-- CORPO -->
    <main>

        <section id="sobre" class="sobre site">
            <header>
                <h3>Quem somos</h3>
            </header>
            <div class="div">
                <div class="sobre-geral">
                    <div class="sobre-texto">
                        <p>A Tech Trio Studio é uma agência criativa focada em transformar ideias em soluções digitais
                            modernas e eficientes. Unimos design, tecnologia e estratégia para ajudar empresas a
                            crescerem e se destacarem no ambiente online. Trabalhamos com projetos personalizados,
                            sempre buscando qualidade, inovação e resultados reais. Mais do que serviços, entregamos
                            soluções que fortalecem a presença digital dos nossos clientes.</p>
                    </div>

                    <div class="sobre-img">
                        <img src="assets/sobre.jpg" alt="Sobre a Tech Trio Studio">
                    </div>
                </div>
            </div>
        </section>

        <!-- COMEÇO DOS NOSSOS SERVIÇOS -->
        <section id="servicos" class="nossos-servicos">
            
        <div class="nossos-servicos-inteiro site">
            <header>
                <p class="etiqueta">Nossos Serviços</p>
                <h3>Soluções completas sob medida para sua empresa</h3>
            </header>
           
            <div class="coluna_de_servicos">
                <div class="coluna_singular">
                    <img src="assets/rolo-de-pintura.svg" alt="Ícone de sites personalizados">
                    <h3>Sites Personalizados</h3>
                    <p>Criamos sites modernos, responsivos e personalizados para empresas, profissionais e marcas que desejam fortalecer sua presença digital. Cada projeto é desenvolvido com foco em desempenho, identidade visual e uma excelente experiência para o usuário. </p>

                </div>
                <div class="coluna_singular">
                    <img src="assets/codigo-do-laptop.svg" alt="Ícone de landing pages">
                    <h3>Landing Pages</h3>
                    <p>Desenvolvemos páginas de alta conversão para divulgação de produtos, serviços, eventos ou campanhas. Com design estratégico e chamadas para ação bem posicionadas, as landing pages são pensadas para transformar visitantes em clientes.</p>
                </div>

                <div class="coluna_singular">
                    <img src="assets/crescimento-profissional.svg" alt="Ícone de otimização SEO">
                    <h3>Otimização SEO</h3>
                    <p>Aplicamos técnicas de otimização que ajudam seu site a conquistar melhores posições nos mecanismos de busca, como o Google. O objetivo é aumentar a visibilidade da sua marca, atrair visitantes qualificados e melhorar o desempenho orgânico do seu site.</p>

                </div>

                <div class="coluna_singular">
                    <img src="assets/administrador-alternativo.svg" alt="Ícone de suporte contínuo">
                    <h3>Suporte Contínuo</h3>
                    <p>Oferecemos suporte contínuo para manter seu site sempre atualizado, seguro e funcionando corretamente. Realizamos correções, atualizações de conteúdo, melhorias de desempenho e acompanhamento técnico sempre que necessário.</p>

                </div>

            </div>
        </div>

        </section>
        <!-- FINAL DOS NOSSOS SERVIÇOS -->

        <!-- LINHA DO TEMPO -->
        <section id="linha-tempo" class="secao-linha-tempo site">

            <header>
                <p class="etiqueta">Como Trabalhamos</p>
                <h3>Como Criamos o Seu Site</h3>
                <h4>
                    Um processo estruturado e transparente, 
                    do primeiro alinhamento ao lançamento otimizado, 
                    para que seu projeto chegue ao ar com excelência técnica e visual.
                </h4>
            </header>
            <div class="linha-tempo">
            
                <div class="item-linha-tempo">
                    <div class="item-titulo-lp">
                        <img src="assets/brief-24.png" alt="">
                        <p>01</p>
                    </div>
                    <div class="item-paragrafo-lp">
                        <h4>Briefing e Alinhamento Inicial</h4>
                        <p>Tudo começa com o briefing. Nessa etapa, a 
                        agência conversa com o cliente para entender 
                        o objetivo do site, público-alvo, 
                        concorrentes e funcionalidades necessárias. 
                        É aqui que se definem pontos como estilo 
                        visual, páginas principais e metas do projeto. 
                        Quanto mais claro for esse alinhamento, melhor 
                        será todo o processo.</p>
                    </div>
                </div>
        
                <div class="item-linha-tempo">
                    <div class="item-titulo-lp">
                        <img src="assets/mapa-24.png" alt="">
                        <p>02</p>
                    </div>

                    <div class="item-paragrafo-lp">
                        <h4>Planejamento e Estrutura do Site</h4>
                        <p>Em seguida vem o planejamento. A equipe organiza a estrutura do site (sitemap), 
                        define quais páginas existirão e como o usuário irá navegar entre elas. 
                        Também são escolhidas tecnologias, prazos e prioridades. Muitas vezes, 
                        são criados wireframes simples para visualizar a disposição dos elementos 
                        antes do design final.</p>
                    </div>
                    
                </div>
        
                <div class="item-linha-tempo">
                    <div class="item-titulo-lp">
                        <img src="assets/design-24.png" alt="">
                        <p>03</p>
                    </div>
                    <div class="item-paragrafo-lp">
                        <h4>Criação do Design (UI/UX)</h4>
                        <p>Depois disso, entra a fase de design. Os designers criam a 
                        aparência do site, incluindo cores, tipografia, imagens e 
                        layout. É nessa etapa que o projeto ganha identidade visual 
                        e começa a se parecer com o produto final. O cliente geralmente 
                        revisa e aprova antes de seguir adiante.</p>
                    </div>
                    
                </div>
        
                <div class="item-linha-tempo">
                    <div class="item-titulo-lp">
                        <img src="assets/terminal-24.png" alt="">
                        <p>04</p>
                    </div>
                    <div class="item-paragrafo-lp">
                        <h4>Desenvolvimento e Programação</h4>
                        <p>Com o design aprovado, começa o desenvolvimento. Os desenvolvedores 
                        transformam o layout em um site funcional usando código (HTML, CSS, 
                        JavaScript e, se necessário, back-end). Aqui são implementadas todas 
                        as interações, responsividade (adaptação para celular) e funcionalidades 
                        definidas no início.</p>
                    </div> 
                </div>
        
                <div class="item-linha-tempo">
                    <div class="item-titulo-lp">
                        <img src="assets/zoom-in-24.png" alt="">
                        <p>05</p>
                    </div>
                    <div class="item-paragrafo-lp">
                        <h4>Testes e Ajustes Finais</h4>
                        <p>Na sequência, vem a etapa de testes. A agência verifica se tudo está 
                        funcionando corretamente, corrigindo erros, testando em diferentes 
                        dispositivos e navegadores, e garantindo boa performance. Também são 
                        feitos ajustes finais com base no feedback do cliente.</p>
                    </div> 
                </div>

                <div class="item-linha-tempo">
                    <div class="item-titulo-lp">
                        <img src="assets/launch-24.png" alt="">
                        <p>06</p>
                    </div>
                    <div class="item-paragrafo-lp">
                        <h4>Lançamento e Pós-Produção</h4>
                        <p>Por fim, acontece o lançamento. O site é publicado no servidor e 
                        passa a ficar disponível para o público. Mesmo depois disso, a 
                        agência pode continuar oferecendo suporte, atualizações e melhorias 
                        contínuas, garantindo que o site continue funcionando bem e 
                        evoluindo com o tempo.</p>
                    </div>
                </div>

            </div>


        </section>
        <!-- FINAL LINHA TEMPO -->

        <!-- EQUIPE -->
        <section id="time" class="equipe">

            <div class="teste site">
                <header class="cabecario-equipe">
                    <p class="etiqueta">Quem cria sua infraestrutura</p>
                    <h3>Especialistas Dedicados ao seu Projeto</h3>
                    <h4>Unindo engenharia, estratégia de negócios e design de ponta sob a mesma marca.</h4>
                </header>

                <div class="cards-equipe">
                    <div class="card">
                        <img src="./assets/andre_foto.jpg" alt="Foto de André Coelho">
                        <h3>André Coelho</h3>
                    </div>

                    <div class="card">
                        <img src="./assets/guilherme_foto.jpeg" alt="Foto de Guilherme Pignataro">
                        <h3>Guilherme Pignataro</h3>
                    </div>

                    <div class="card">
                        <img src="./assets/kaua_foto.png" alt="Foto de Kauã Moreira">
                        <h3>Kauã Moreira</h3>
                    </div>

                </div>
            </div>
        </section>
        <!-- FIM DE EQUIPES -->

        

        <!-- Funcionamentos do Site -->
        <!-- <section class="site funcionamentos">
            <header>
                <h3>Funcionamentos do Site</h3>
            </header>

            <div class="funcional-todos">
                <div class="funcionalidades">
                    <div class="cards-funcio">
                        <img src="./assets/analysis.svg" alt="">
                        <h4>Briefing e Alinhamento</h4>
                        <p>Tudo começa com uma conversa estratégica 
                            para entender o objetivo do site, o 
                            público-alvo e as necessidades do 
                            cliente. Nessa fase, são definidos os 
                            requisitos principais, referências 
                            visuais e metas do projeto, garantindo 
                            que todos estejam alinhados antes de iniciar.</p>
                    </div>
                    
                </div>

                <div class="funcionalidades">
                    <div class="cards-funcio">
                        <img src="./assets/analysis.svg" alt="">
                        <h4>Briefing e Alinhamento</h4>
                        <p>Tudo começa com uma conversa estratégica 
                            para entender o objetivo do site, o 
                            público-alvo e as necessidades do 
                            cliente. Nessa fase, são definidos os 
                            requisitos principais, referências 
                            visuais e metas do projeto, garantindo 
                            que todos estejam alinhados antes de iniciar.</p>
                    </div>
                    
                </div>

                <div class="funcionalidades">
                    <div class="cards-funcio">
                        <img src="./assets/analysis.svg" alt="">
                        <h4>Briefing e Alinhamento</h4>
                        <p>Tudo começa com uma conversa estratégica 
                            para entender o objetivo do site, o 
                            público-alvo e as necessidades do 
                            cliente. Nessa fase, são definidos os 
                            requisitos principais, referências 
                            visuais e metas do projeto, garantindo 
                            que todos estejam alinhados antes de iniciar.</p>
                    </div>
                    
                </div>

                <div class="funcionalidades">
                    <div class="cards-funcio">
                        <img src="./assets/analysis.svg" alt="">
                        <h4>Briefing e Alinhamento</h4>
                        <p>Tudo começa com uma conversa estratégica 
                            para entender o objetivo do site, o 
                            público-alvo e as necessidades do 
                            cliente. Nessa fase, são definidos os 
                            requisitos principais, referências 
                            visuais e metas do projeto, garantindo 
                            que todos estejam alinhados antes de iniciar.</p>
                    </div>
                    
                </div>

                <div class="funcionalidades">
                    <div class="cards-funcio">
                        <img src="./assets/analysis.svg" alt="">
                        <h4>Briefing e Alinhamento</h4>
                        <p>Tudo começa com uma conversa estratégica 
                            para entender o objetivo do site, o 
                            público-alvo e as necessidades do 
                            cliente. Nessa fase, são definidos os 
                            requisitos principais, referências 
                            visuais e metas do projeto, garantindo 
                            que todos estejam alinhados antes de iniciar.</p>
                    </div>
                    
                </div>

                <div class="funcionalidades">
                    <div class="cards-funcio">
                        <img src="./assets/analysis.svg" alt="">
                        <h4>Briefing e Alinhamento</h4>
                        <p>Tudo começa com uma conversa estratégica 
                            para entender o objetivo do site, o 
                            público-alvo e as necessidades do 
                            cliente. Nessa fase, são definidos os 
                            requisitos principais, referências 
                            visuais e metas do projeto, garantindo 
                            que todos estejam alinhados antes de iniciar.</p>
                    </div>
                    
                </div>
            </div>

            
        </section> -->
        <!-- Final Funcionamento do Site -->

        

        <section class="faq">
            
            <div class="equipe-inteiro site">
                <p class="etiqueta">Dúvidas frequentes</p>
                <h3>Dúvidas frequentes sobre a TechTrioStudio</h3>
            
                <!-- container para o accordion FAQ -->
                <div class="accordion-container">
                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger">O que é uma agência de criação de sites?</button>
                        </h2>
                        <div class="ac-panel">
                            <p class="ac-text">Uma agência de desenvolvimento de sites é uma empresa
                                especializada na criação, design, manutenção e otimização
                                de sites para indivíduos, empresas e organizações.</p>
                        </div>
                    </div>

                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger">Quanto tempo leva para desenvolver um site?</button>
                        </h2>
                        <div class="ac-panel ">
                            <p class="ac-text">O prazo depende da complexidade do projeto. Projetos mais personalizados, como sistemas web, podem exigir mais tempo. Antes do início, apresentamos um cronograma detalhado.</p>
                        </div>
                    </div>

                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger">Meu site será responsivo para celulares e tablets?</button>
                        </h2>
                        <div class="ac-panel">
                            <p class="ac-text">Sim. Todos os nossos projetos são desenvolvidos com design responsivo, garantindo uma experiência de navegação otimizada em computadores, smartphones e tablets.</p>
                        </div>
                    </div>

                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger">Vocês oferecem suporte após a entrega do site?</button>
                        </h2>
                        <div class="ac-panel">
                            <p class="ac-text">Sim. Após a publicação do projeto, oferecemos suporte para solucionar dúvidas, corrigir eventuais problemas e, caso desejado, planos de manutenção para manter o site atualizado e seguro.</p>
                        </div>
                    </div>

                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger">Meu site aparecerá no Google?</button>
                        </h2>
                        <div class="ac-panel">
                            <p class="ac-text">Desenvolvemos todos os sites seguindo boas práticas de SEO (Otimização para Motores de Busca), facilitando a indexação pelo Google. Também oferecemos serviços de otimização avançada para melhorar o posicionamento nos resultados de pesquisa.</p>
                        </div>
                    </div>

                    <div class="ac">
                        <h2 class="ac-header">
                            <button type="button" class="ac-trigger">Posso solicitar alterações durante o desenvolvimento?</button>
                        </h2>
                        <div class="ac-panel">
                            <p class="ac-text">Sim. Durante o desenvolvimento, mantemos contato constante para apresentar o progresso e receber seu feedback. Pequenos ajustes fazem parte do processo, enquanto alterações que mudem significativamente o escopo podem ser orçadas separadamente.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- --------------------------------- -->

        </section>


        <section id="contato" class="formulario_de_contato">

            <div class="pai-formulario site">
                <div class="formulario-esquerda">
                    <p class="etiqueta">Fale Conosco</p>
                    <h3>Vamos construir sua próxima <br> solução digital juntos?</h3>
                    <h4>Preencha o formulário e agende uma conversa <br> detalhada
                        com um especialista do nosso time.
                    </h4>

                    <ul>
                        <li><a href="mailto:contato@techtrio.com.br"><img src="assets/email-32.png" alt="Email para contato">contato@techtrio.com.br</a></li>
                        <li><a href="tel:+5511987654321"><img src="assets/telefone.png" alt="Número de telefone para contato: +55 (11) 98765-4321">+55 (11) 98765-4321</a></li>
                    </ul>
                    
                </div>

                <div class="container_form">

                    <form action="#" method="post">

                        <!-- Alertas -->
                        <?php if($ok == 1): ?>
                            <div class="alerta-sucesso">Mensagem enviada com sucesso!</div>
                        <?php elseif($ok == 2): ?>
                            <div class="alerta-erro">Erro ao enviar mensagem. Por favor, tente novamente mais tarde.</div>
                        <?php endif; ?>

                        <label class="campo-formulario">
                            <span>Seu nome completo</span>
                            <input type="text" name="nome" placeholder="Luís Alves de Lima" autocomplete="name" required>
                        </label>

                        <label class="campo-formulario">
                            <span>Seu e-mail corporativo</span>
                            <input type="email" name="email" placeholder="exemplo@empresa.com.br" autocomplete="email" required>
                        </label>

                        <label class="campo-formulario">
                            <span>Assunto</span>
                            <select name="assunto" required>
                                
                                <option value="" disabled selected>Selecione um assunto</option>
                                <option value="Solicitar orçamento">Solicitar orçamento</option>
                                <option value="Criar um site">Criar um site</option>
                                <option value="Criar uma landing page">Criar uma landing page</option>
                                <option value="Otimização SEO">Otimização SEO</option>
                                <option value="Suporte para meu site">Suporte para meu site</option>
                                <option value="Parceria">Propor parceria</option>
                                <option value="Outro assunto">Outro assunto</option>
                            </select>
                        </label>

                        <label class="campo-formulario area_texto_form">
                            <span>Como podemos ajudar?</span>
                            <textarea name="mensagem" placeholder="Conte um pouco sobre o que você precisa..." required></textarea>
                        </label>

                        <div class="botoes_form">
                            <button type="submit">Enviar Mensagem</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>







    </main>
    <!-- COMEÇO - RODAPÉ DO SITE -->
        <footer class="rodape">
            <!-- COMEÇO - CONTEÚDO DO RODAPÉ -->
            <div class="rodape-conteudo site">

                <!-- PARÁGRAFO E IMAGEM À ESQUERDA -->
                <div class="rodape-logo">
                        <div>
                            <img src="assets/logo-sem-titulo.svg" alt="Logo Tech Trio Studio">
                            <p>TechTrio<span>Studio</span></p>
                        </div> 
                        <p>
                            Transformando marcas e impulsionando negócios através de engenharia
                            web premium, design inteligente e otimização de conversão.
                        </p>

                </div>
                
                <!-- SERVIÇOS -->
                <div class="rodape-links">
                    <h4>Serviços</h4>
                        <ul>
                            <li><a href="#servicos">Sites Otimizados</a></li>
                            <li><a href="#servicos">Landing Pages Premium</a></li>
                            <li><a href="#servicos">Otimização SEO</a></li>
                            <li><a href="#servicos">Suporte Exclusivo</a></li>
                        </ul>
                
                </div>
                
                <!-- AGÊNCIAS -->
                <div class="rodape-links">
                    <h4>Agência</h4>
                    <ul>
                        <li><a href="#sobre">Sobre nós</a></li> 
                        <li><a href="#time">Nosso Time</a></li>
                        <li><a href="#linha-tempo">Como Trabalhamos</a></li>
                        <li><a href="#contato">Fale Conosco</a></li>
                    </ul>    

                </div>

                

            </div>
            <!-- FINAL - CONTEÚDO DO RODAPÉ -->

            <div class="rodape-linha site"></div>

            <!-- LINKS FINAIS -->
            
            <div class="rodape-final site">

                <div class="rodape-creditos">
                    <p>&copy; <?php echo date("Y"); ?> - Criado e Desenvolvido por Tech Trio Studio</p>
                
                </div>
                
                
                <div class="redes_footer">
                    <ul class="redeSociais">
                        <li><a href="#"><img src="assets/instagram-24.png" alt="Logo instagram - Tech Trio Studio"></a></li>
                        <li><a href="#"><img src="assets/linkedin.svg" alt="Logo linkedin - Tech Trio Studio"></a></li>
                        <li><a href="#"><img src="assets/whatsapp-24.png" alt="Logo whatsApp - Tech Trio Studio"></a></li>
                    </ul>
                </div>
            </div>
            
        </footer>
    <!-- FINAL - RODAPÉ DO SITE -->

    <!-- INÍCIO - BOTÃO FLUTUANTE PARA O TOPO -->
        <a href="#home" class="botao-flutuante">
            <img src="assets/seta-para-cima.png" alt="Botão flutuante para voltar ao topo do site">
        </a>
     <!-- FIM - BOTÃO FLUTUANTE PARA O TOPO -->

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- ANIMAÇÃO SLICK -->
    <script src="js/slick.min.js"></script>
    <script src="js/accordion.min.js"></script>

    <!-- LOCOMOTIVE SCROLL (precisa vir antes do script.js, que o inicializa) -->
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@5.0.1/bundled/locomotive-scroll.min.js"></script>

    <!-- MEU SCRIPT (ANIMAÇÃO) -->
    <script src="js/script.js"></script>
    <script src="js/hero-parallax.js"></script>
    <script src="js/wow.min.js"></script>


</body>
