# Lumin 

Aplicativo de aprendizado de idiomas com **tradução em tempo real de objetos do mundo real**.
Este repositório contém o **site de apresentação do TCC** feito em **Laravel + Laravel Breeze** (Blade + Tailwind CSS), **sem CRUD**.

> Status do projeto: **Em desenvolvimento (MVP)**
> Repositório: https://github.com/AntonioSena0/Lumin

## Sobre o projeto

Com a câmera do celular, o Lumin identifica objetos do mundo real em tempo real e mostra a tradução correspondente, conectando o que o usuário vê ao vocabulário de outro idioma. O objetivo é ajudar pessoas a aprender vocabulário de forma natural, usando o contexto visual do cotidiano, sem depender apenas de listas de palavras.

### Funcionalidades (versão atual)

- Câmera com detecção de objetos em tempo real
- Identificação do objeto centralizado na tela
- Tradução local do objeto detectado
- Filtro para evitar múltiplas traduções ao mesmo tempo

### Stack principal do TCC

| Categoria | Tecnologias |
|---|---|
| Languages and Frameworks | Dart, Flutter, Java, Spring Boot |
| Database | PostgreSQL |
| Tools | Docker, Git |

### Como rodar o aplicativo (TCC)

**API**

1. Crie um arquivo `.env` dentro da pasta `api` baseado no `.env.example`.
2. Na raiz do projeto, execute: `docker compose up --build`

**Mobile**

```sh
flutter pub get          # instala as dependências
flutter devices          # verifica se o dispositivo foi reconhecido
flutter run              # roda no celular ou emulador
flutter build apk --debug
adb install -r build/app/outputs/flutter-apk/app-debug.apk
```

Observações: a câmera depende de permissão no Android; o app detecta um objeto por vez (prioriza o centralizado); o build pode exibir aviso sobre Kotlin Gradle Plugin no plugin `ultralytics_yolo`, sem bloquear o build.

## Este site (Laravel + Breeze)

### Requisitos

- PHP 8.3+ e Composer
- Node.js 20+ e npm
- Banco de dados: **SQLite** (padrão) ou MySQL

### Instalação

```sh
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite     # (SQLite) — ou configure o MySQL no .env
php artisan migrate                # cria as tabelas de usuários
npm install
npm run build                      # ou: npm run dev
php artisan serve
```

Acesse http://localhost:8000.

### Front end

- **Landing page** — `resources/views/welcome.blade.php`: nome do projeto, sobre, funcionalidades, tecnologias, como rodar e equipe.
- **Dashboard** — `resources/views/dashboard.blade.php` (requer login): demonstração técnica com os protótipos das telas do app (Figma), fluxo técnico, tecnologias, rotas do Breeze, como rodar e atribuições da equipe.
- Telas do protótipo (wireframe do Figma) em `public/images/screens/` e exibidas pelo componente `<x-phone>`.
- Componentes Blade em `resources/views/components/` (`icon`, `phone`, `password-input` e os componentes do Breeze com o visual Lumin).
- Telas de login, cadastro e recuperação de senha seguem o wireframe (tema escuro, botões em degradê violeta → magenta).
- Estilo: **Tailwind CSS 3** (`tailwind.config.js` com a paleta Lumin) e **Alpine.js** (menu mobile, galeria e ampliação das telas). Fonte: Poppins.
- O conteúdo do TCC vive em um único arquivo: `config/lumin.php` (sem CRUD).

### Back end (Laravel Breeze)

O Breeze fornece as rotas e telas de autenticação:

| Rota | Função |
|---|---|
| `/login` | Entrar |
| `/register` | Criar conta |
| `/forgot-password` | Recuperação de senha |
| `/dashboard` | Painel de controle (autenticado) |
| `/profile` | Perfil do usuário |

Não há CRUD próprio: o único banco usado é o das tabelas de usuários criadas pelas migrações.

### Figma

Defina o link do protótipo em `.env`:

```
LUMIN_FIGMA_URL=https://www.figma.com/...
```

## Equipe e atribuições

| Aluno | GitHub | Atribuição no Laravel |
|---|---|---|
| Antonio Sena | [/AntonioSena0](https://github.com/AntonioSena0) | _preencher_ |
| Arthur Gutemberg | [/ArthurGutemberg9](https://github.com/ArthurGutemberg9) | _preencher_ |
| Beatriz Galdino | [/Beatriz1S05](https://github.com/Beatriz1S05) | _preencher_ |
| Giovanna Torres | [/GiT0rres](https://github.com/GiT0rres) | _preencher_ |

(Edite também o campo `role` de cada aluno em `config/lumin.php` para aparecer no dashboard.)
