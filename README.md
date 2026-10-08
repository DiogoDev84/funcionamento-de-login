# 🔐 Funcionamento de Login

Projeto de estudo: um sistema de login construído com **Laravel**, seguindo o padrão **MVC**, rodando em **Docker** com banco de dados **MySQL**.

O objetivo foi aprender, passo a passo, como um login funciona por dentro e quais cuidados de segurança ele precisa ter.

## 🛠️ Tecnologias

- PHP e Laravel
- Docker com Laravel Sail
- MySQL (visualizado com DBeaver)
- WSL / Ubuntu
- HTML, Blade e CSS

## ✨ Funcionalidades

- Tela de login com validação dos campos
- Mensagens de erro exibidas ao usuário
- Página de painel protegida, acessível somente após o login
- Logout (sair do sistema)

## 🔒 Segurança

- **Senhas com hash:** a senha nunca é salva como texto no banco, e sim embaralhada com bcrypt
- **Proteção CSRF:** os formulários levam um código secreto, conferido pelo servidor, que impede envios vindos de sites falsos
- **Mensagem de erro genérica:** "E-mail ou senha incorretos", sem revelar quais e-mails estão cadastrados
- **Sessão regenerada no login:** o identificador da sessão é trocado após o login, impedindo o reaproveitamento de sessões antigas
- **Middleware `auth`:** bloqueia o acesso ao painel de quem não fez login e redireciona para a tela de login
- **Logout seguro:** feito via POST com CSRF, invalidando a sessão e gerando um novo token
- **Dados sensíveis fora do repositório:** o arquivo `.env`, com senhas e chaves, não é enviado ao GitHub

## 📁 Arquivos principais

| Arquivo | Responsabilidade |
|---|---|
| `routes/web.php` | Define as rotas do sistema |
| `app/Http/Controllers/LoginController.php` | Mostra o formulário, faz o login e o logout |
| `resources/views/auth/login.blade.php` | Tela de login |
| `resources/views/dashboard.blade.php` | Painel protegido |
| `database/seeders/DatabaseSeeder.php` | Cria o usuário de teste |
| `public/css/style.css` | Estilo das telas |

## 🧪 Usuário de teste

Criado pelo seeder, apenas para uso local:

- **E-mail:** admin@email.com
- **Senha:** 12345678

## 📚 Sobre

Projeto feito para aprendizado, entendendo cada arquivo e cada etapa, em vez de apenas copiar código.