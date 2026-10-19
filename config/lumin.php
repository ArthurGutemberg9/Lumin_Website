<?php

/*
|--------------------------------------------------------------------------
| Dados do TCC — Lumin
|--------------------------------------------------------------------------
| Fonte única de conteúdo do front-end (SEM CRUD). A landing page
| (welcome.blade.php) e o painel (dashboard.blade.php) leem tudo daqui.
*/

return [
    'name' => 'Lumin',
    'tagline' => 'O mundo é o seu melhor dicionário.',
    'description' => 'Um aplicativo de aprendizado de idiomas com tradução em tempo real de objetos do mundo real.',
    'status' => 'Em desenvolvimento (MVP)',

    'github_url' => 'https://github.com/AntonioSena0/Lumin',
    'figma_url' => env('LUMIN_FIGMA_URL'),

    'about' => [
        'O Lumin é um aplicativo de aprendizado de idiomas que transforma o dia a dia em uma sala de aula.',
        'Com a câmera do celular, o app identifica objetos do mundo real em tempo real e mostra a tradução correspondente, conectando o que o usuário vê ao vocabulário de outro idioma.',
        'O objetivo é ajudar pessoas a aprender vocabulário de forma natural, usando o contexto visual do cotidiano, sem depender apenas de listas de palavras.',
    ],

    'highlights' => [
        'Aprender com o que você vê',
        'Tradução em tempo real',
        'Contexto real do dia a dia',
        'De forma simples e intuitiva',
    ],

    'quote' => 'Mais do que palavras, é sobre ver o mundo de outro jeito.',

    'features' => [
        ['icon' => 'camera', 'title' => 'Câmera com detecção de objetos em tempo real'],
        ['icon' => 'crosshair', 'title' => 'Identificação do objeto centralizado na tela'],
        ['icon' => 'languages', 'title' => 'Tradução local do objeto detectado'],
        ['icon' => 'filter', 'title' => 'Filtro para evitar múltiplas traduções ao mesmo tempo'],
    ],

    'stack' => [
        ['category' => 'Languages and Frameworks', 'icon' => 'layers', 'items' => ['Dart', 'Flutter', 'Java', 'Spring Boot']],
        ['category' => 'Database', 'icon' => 'database', 'items' => ['PostgreSQL']],
        ['category' => 'Tools', 'icon' => 'wrench', 'items' => ['Docker', 'Git']],
    ],

    'run' => [
        'api' => [
            'steps' => [
                'Crie um arquivo <code>.env</code> dentro da pasta api baseado no <code>.env.example</code>.',
                'Na raiz do projeto, execute:',
            ],
            'command' => 'docker compose up --build',
        ],
        'mobile' => [
            'steps' => [
                'Instale as dependências: <code>flutter pub get</code>',
                'Verifique se o dispositivo foi reconhecido: <code>flutter devices</code>',
                'Rode o app no celular ou emulador: <code>flutter run</code>',
                'Para gerar um APK debug: <code>flutter build apk --debug</code>',
                'Para instalar via ADB:',
            ],
            'command' => 'adb install -r build/app/outputs/flutter-apk/app-debug.apk',
        ],
        'notes' => [
            'A feature da câmera depende de permissão de câmera no Android.',
            'O app detecta apenas um objeto por vez, priorizando o objeto centralizado na tela.',
            'O build pode exibir um aviso sobre Kotlin Gradle Plugin no plugin ultralytics_yolo; esse aviso não bloqueia o build atual.',
        ],
    ],

    /*
     | Equipe. Preencha 'role' com a atribuição de cada aluno no desenvolvimento
     | em Laravel (exigência da entrega: mostrar no vídeo e no GitHub).
     */
    'team' => [
        ['name' => 'Antonio Sena', 'handle' => 'AntonioSena0', 'linkedin' => 'https://www.linkedin.com/in/antonio-sena-neto', 'initials' => 'AS', 'photo' => 'images/team/antonio.webp', 'role' => null],
        ['name' => 'Arthur Gutemberg', 'handle' => 'ArthurGutemberg9', 'linkedin' => 'https://www.linkedin.com/in/arthur-g-83247b3b2', 'initials' => 'AG', 'photo' => 'images/team/arthur.webp', 'role' => null],
        ['name' => 'Beatriz Galdino', 'handle' => 'Beatriz1505', 'linkedin' => 'https://www.linkedin.com/in/beatriz-galdino-torres-1b7024307', 'initials' => 'BG', 'photo' => 'images/team/beatriz.webp', 'role' => null],
        ['name' => 'Giovanna Torres', 'handle' => 'GiT0rres', 'linkedin' => 'https://www.linkedin.com/in/giovanna--torres', 'initials' => 'GT', 'photo' => 'images/team/giovanna.webp', 'role' => null],
    ],

    // Protótipos: telas do wireframe no Figma (public/images/screens/*.webp).
    'prototypes' => [
        ['file' => 'splash', 'group' => 'Onboarding', 'title' => 'Boas-vindas', 'caption' => 'Abertura do app com a chamada Explore, Aprenda, Conecte-se.'],
        ['file' => 'login', 'group' => 'Onboarding', 'title' => 'Login', 'caption' => 'Entrada com e-mail e senha ou com conta Google.'],
        ['file' => 'cadastro', 'group' => 'Onboarding', 'title' => 'Cadastro', 'caption' => 'Nome de usuário, e-mail, senha e aceite dos termos de uso.'],
        ['file' => 'nivelamento', 'group' => 'Onboarding', 'title' => 'Teste de nivelamento', 'caption' => 'Avalia gramática, leitura e escuta em cerca de 5 minutos (níveis N1 a N3).'],
        ['file' => 'home', 'group' => 'Principal', 'title' => 'Home', 'caption' => 'Objetivo, continuar aprendendo, módulos e atalho para a câmera.'],
        ['file' => 'explorar', 'group' => 'Principal', 'title' => 'Explorar', 'caption' => 'Busca de palavras, minhas palavras e traduções de outros usuários por categoria.'],
        ['file' => 'idiomas', 'group' => 'Principal', 'title' => 'Idiomas', 'caption' => 'Idiomas recentes e lista completa, com busca.'],
        ['file' => 'camera', 'group' => 'Tradução', 'title' => 'Câmera', 'caption' => 'Seleção de idiomas, objeto destacado no centro e aviso de idioma detectado.'],
        ['file' => 'salvar', 'group' => 'Tradução', 'title' => 'Salvar tradução', 'caption' => 'Texto original, tradução, par de idiomas e categoria.'],
        ['file' => 'historico', 'group' => 'Tradução', 'title' => 'Histórico', 'caption' => 'Todas as traduções ou só as salvas, com opção de limpar.'],
        ['file' => 'detalhes', 'group' => 'Tradução', 'title' => 'Detalhes da tradução', 'caption' => 'Tradução, pronúncia, significado, exemplos e botão para praticar a palavra.'],
        ['file' => 'configuracoes', 'group' => 'Conta', 'title' => 'Configurações', 'caption' => 'Idioma do app, notificações, voz, tradução automática e sair da conta.'],
        ['file' => 'perfil', 'group' => 'Conta', 'title' => 'Perfil', 'caption' => 'Nível, palavras aprendidas, dias no Lumin e atalhos de progresso.'],
    ],

    // Jornada do usuário (ordem das telas no protótipo).
    'journey' => [
        'Boas-vindas', 'Cadastro / Login', 'Teste de nivelamento', 'Home', 'Câmera', 'Salvar tradução', 'Histórico', 'Detalhes', 'Praticar palavra',
    ],

    // Fluxo técnico exibido no dashboard.
    'pipeline' => [
        ['icon' => 'camera', 'title' => 'Captura', 'text' => 'Câmera do celular (permissão Android).'],
        ['icon' => 'scan-line', 'title' => 'Detecção', 'text' => 'Modelo YOLO detecta objetos no quadro.'],
        ['icon' => 'crosshair', 'title' => 'Seleção', 'text' => 'Prioriza o objeto centralizado; um por vez.'],
        ['icon' => 'languages', 'title' => 'Tradução', 'text' => 'Tradução local (EN ⇄ PT).'],
        ['icon' => 'smartphone', 'title' => 'Exibição', 'text' => 'Cartão com termo, tradução e copiar.'],
    ],

    // Rotas geradas pelo Laravel Breeze (para demonstração no vídeo).
    'breeze_routes' => [
        ['uri' => '/login', 'name' => 'login', 'desc' => 'Entrar'],
        ['uri' => '/register', 'name' => 'register', 'desc' => 'Criar conta'],
        ['uri' => '/forgot-password', 'name' => 'password.request', 'desc' => 'Recuperação de senha'],
        ['uri' => '/dashboard', 'name' => 'dashboard', 'desc' => 'Painel de controle (autenticado)'],
        ['uri' => '/profile', 'name' => 'profile.edit', 'desc' => 'Perfil do usuário'],
    ],
];
