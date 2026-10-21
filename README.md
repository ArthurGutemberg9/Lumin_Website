# 🌌 LUMIN
### Aprenda idiomas. Explore o mundo. Traduza a realidade.

<p align="center">
  <img src="https://img.shields.io/badge/STATUS-EM_DESENVOLVIMENTO-9D4EDD?style=for-the-badge" alt="Status: Em desenvolvimento" />
  <img src="https://img.shields.io/badge/PROJETO-TCC-7B2CBF?style=for-the-badge" alt="Projeto TCC" />
  <img src="https://img.shields.io/badge/PLATAFORMA-Mobile-5A189A?style=for-the-badge" alt="Aplicativo mobile" />
</p>

<p align="center">
  <strong>Transformando o mundo real em uma experiência de aprendizado de idiomas.</strong>
  <br />
  <em>Uma nova maneira de aprender vocabulário: observando, descobrindo e interagindo com o cotidiano.</em>
</p>

<p align="center">
  <a href="https://github.com/AntonioSena0/Lumin">Repositório do projeto</a>
</p>

---

## ✨ Sobre o projeto

O **Lumin** é um aplicativo de aprendizado de idiomas que utiliza a câmera do celular para identificar objetos do mundo real e apresentar suas traduções em tempo real.

A proposta é tornar o aprendizado mais **natural, visual e contextualizado**, conectando os objetos presentes no dia a dia ao vocabulário de outro idioma.

Em vez de depender exclusivamente de listas de palavras e métodos tradicionais, o usuário aprende a partir daquilo que vê ao seu redor.

> 💡 **Nossa ideia:** transformar qualquer ambiente em uma oportunidade de aprendizado.

## 🎯 Objetivo

Desenvolver uma ferramenta tecnológica que facilite a aquisição de vocabulário em outros idiomas por meio da identificação visual de objetos, aproximando o aprendizado da realidade do usuário.

## 🚀 Funcionalidades do aplicativo

| Funcionalidade | Descrição |
|:---|:---|
| 📷 **Detecção em tempo real** | Utiliza a câmera para identificar objetos do ambiente. |
| 🎯 **Foco inteligente** | Prioriza o objeto centralizado na tela. |
| 🌍 **Tradução de objetos** | Apresenta a tradução correspondente ao objeto identificado. |
| ⚡ **Controle de detecções** | Evita exibir múltiplas traduções simultaneamente. |

<sub>O aplicativo está em desenvolvimento e as funcionalidades podem evoluir durante a construção do MVP.</sub>

---

## 🛠️ Tecnologias utilizadas

As tecnologias estão organizadas de acordo com suas funções no projeto.

| Categoria | Tecnologias |
|:---|:---|
| 📱 Aplicativo mobile | Dart, Flutter |
| ⚙️ Backend / API | Java, Spring Boot |
| 🗄️ Banco de dados | PostgreSQL |
| 🐳 Ambiente e containers | Docker |
| 🎨 Site de apresentação | Laravel, Blade, Tailwind CSS |
| 🔐 Autenticação do site | Laravel Breeze |
| 🧰 Versionamento | Git e GitHub |

---

# 📱 Executando o aplicativo Lumin

## Pré-requisitos

Antes de começar, verifique se você possui:

- Flutter SDK instalado e configurado;
- Android Studio ou ferramentas necessárias para o Android SDK;
- Java compatível com a versão do backend;
- Docker e Docker Compose;
- Um dispositivo Android com depuração USB habilitada ou um emulador.

## 1. Configurando a API

A API é responsável pela estrutura de backend do aplicativo.

**Passo 1 — Configure as variáveis de ambiente**

Crie o arquivo `.env` dentro da pasta `api`, utilizando o `.env.example` como referência.

```shell
copy .env.example .env
```

**Passo 2 — Inicie os serviços**

Na raiz do projeto, execute:

```bash
docker compose up --build
```

Aguarde a construção das imagens e a inicialização dos serviços.

> ⚠️ Verifique se as variáveis de ambiente, as credenciais do banco e as portas estão configuradas corretamente antes de executar a API.

## 2. Configurando o aplicativo mobile

Entre na pasta `mobile` e execute os comandos abaixo:

```bash
# Instala as dependências do Flutter
flutter pub get

# Verifica os dispositivos disponíveis
flutter devices

# Executa o aplicativo
flutter run
```

### Gerando o APK

Para gerar uma versão de depuração do aplicativo:

```bash
flutter build apk --debug
```

O arquivo gerado normalmente estará em:

```text
build/app/outputs/flutter-apk/app-debug.apk
```

Para instalar ou atualizar o aplicativo em um dispositivo Android conectado e autorizado:

```bash
adb install -r build/app/outputs/flutter-apk/app-debug.apk
```

### 📌 Observações importantes

- A câmera precisa da permissão correspondente no Android.
- O aplicativo prioriza um objeto por vez, com foco no objeto centralizado.
- O dispositivo deve estar autorizado para depuração USB quando a execução ocorrer por meio do ADB.
- O plugin `ultralytics_yolo` pode apresentar avisos relacionados ao Kotlin Gradle Plugin durante a compilação. Verifique se o build realmente falhou antes de tratar o aviso como erro.

---

# 💻 Site de apresentação do TCC

Além do aplicativo mobile, o projeto possui um site desenvolvido para apresentar o Lumin, explicar sua proposta, demonstrar suas funcionalidades e documentar os aspectos técnicos do TCC.

**Tecnologias:** Laravel + Laravel Breeze + Blade + Tailwind CSS.

O site não possui CRUD próprio. Seu banco de dados é utilizado pelas funcionalidades de autenticação disponibilizadas pelo Laravel Breeze.

## 📋 Requisitos do ambiente

- PHP 8.3 ou superior;
- Composer;
- Node.js 20 ou superior;
- npm;
- SQLite ou MySQL.

## ⚙️ Instalação e execução

**1. Instale as dependências do PHP**

```bash
composer install
```

**2. Configure o ambiente**

```bash
cp .env.example .env
php artisan key:generate
```

ou

```shell
php artisan key:generate
````

**3. Configure o banco de dados**

Para utilizar SQLite:

```bash
touch database/database.sqlite
php artisan migrate
```

**4. Instale as dependências do front-end**

```bash
npm install
npm run build
```

**5. Inicie a aplicação**

```bash
composer run dev
```

**6. Utilizar seeders**

```bash
php artisan db:seed
```

## 🖥️ Estrutura do site

| Área | Arquivo / Diretório | Descrição |
|:---|:---|:---|
| 🏠 Landing page | `resources/views/welcome.blade.php` | Apresentação do projeto, funcionalidades, tecnologias e equipe. |
| 📊 Dashboard | `resources/views/dashboard.blade.php` | Demonstração técnica, protótipos, fluxo e informações do desenvolvimento. |
| 📱 Protótipos | `public/images/screens/` | Imagens das telas desenvolvidas no Figma. |
| 🧩 Componentes | `resources/views/components/` | Componentes Blade reutilizáveis, incluindo ícones, dispositivos e campos de senha. |
| ⚙️ Conteúdo | `config/lumin.php` | Informações do projeto centralizadas em configuração, sem CRUD. |
| 🎨 Estilos | `tailwind.config.js` | Configuração da identidade visual do site. |

### 🎨 Identidade visual

O site utiliza uma interface com tema escuro, tipografia Poppins e uma paleta de tons violeta e magenta.

- **Tailwind CSS 3:** estilização e identidade visual;
- **Alpine.js:** interações, menu mobile, galeria e ampliação dos protótipos;
- **Laravel Breeze:** autenticação e páginas relacionadas.

## 🔐 Autenticação e rotas

O Laravel Breeze fornece as funcionalidades de autenticação utilizadas pelo site.

| Rota | Funcionalidade |
|:---|:---|
| `/login` | Login de usuários |
| `/register` | Cadastro de usuários |
| `/forgot-password` | Recuperação de senha |
| `/dashboard` | Painel de demonstração, com autenticação |
| `/profile` | Perfil do usuário |

**Importante:** o site não implementa CRUD de alunos, cursos ou outros recursos. As tabelas utilizadas são as relacionadas à autenticação e ao perfil do usuário, conforme as migrações presentes no projeto.

---

## 👥 Equipe de desenvolvimento

Conheça as pessoas envolvidas no desenvolvimento do Lumin e suas atribuições no aplicativo e no site Laravel.

| Integrante | GitHub | Atribuição |
|:---|:---|:---|
| **Antonio Sena** | [@AntonioSena0](https://github.com/AntonioSena0) | Back-end do Lumin e contribuição para a demonstração do Seeder no site Laravel |
| **Arthur Gutemberg** | [@ArthurGutemberg9](https://github.com/ArthurGutemberg9) | Desenvolvimento do back-end Laravel e gravação/edição do vídeo de demonstração |
| **Beatriz Galdino** | [@Beatriz1S05](https://github.com/Beatriz1S05) | Wireframes do Figma e desenvolvimento do front-end |
| **Giovanna Torres** | [@GiT0rres](https://github.com/GiT0rres) | Implementação da interface e do front-end do site Laravel |

<sub>A divisão acima identifica as contribuições de cada integrante no aplicativo, no site Laravel e na demonstração desta entrega.</sub>

---

## 🌟 Nossa visão

Acreditamos que aprender um novo idioma pode ir além de decorar palavras.

Com o Lumin, queremos aproximar a tecnologia da rotina das pessoas e transformar situações comuns em oportunidades de descoberta, curiosidade e aprendizado.

**Lumin — o mundo ao seu redor também pode ensinar.**

---

<p align="center">
  Desenvolvido com 💜 pela equipe Lumin
  <br />
  <sub>Projeto de Trabalho de Conclusão de Curso (TCC)</sub>
</p>
