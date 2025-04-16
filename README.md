# Clube Envios API

Este projeto é uma API de cotação de fretes desenvolvida em PHP com Laravel.

## ⚙️ Instalação

1. Clone o repositório:

```bash
git clone https://github.com/JoBuzzo/teste-api.git
```

2. Certifique-se de que está utilizando a versão `^8.2` do PHP.

3. Instale as dependências:

```bash
composer install
```

4. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme necessário.

```bash
cp .env.example .env
```

5. Gere a chave da aplicação:

```bash
php artisan key:generate
```

6. Execute as migrations ou use o sql salvo `clubeenvios.sql` salvo no link `https://drive.google.com/drive/folders/1VzyaACbDrtvC3xjT72AApkDApVYTPZLL?usp=sharing`:

```bash
php artisan migrate
```

7. Rode os seeders para popular o banco de dados com dados de cotação e usuários (pular essa etapa se você optou em usar o arquivo `clubeenvios.sql`):

```bash
php artisan db:seed
```

8. Inicie o servidor:

```bash
php artisan serve
```

## 📦 Postman

Importe o arquivo `Clube envios.postman_collection.json` na raiz do projeto no Postman para testar os endpoints disponíveis.

---

## 📡 Variáveis

#### url `https://teste-api.test/api/v1`

#### token `bc35ff072f1120bb5211541cc578276d017ce8136619baad387d423d9000`

## 📡 Endpoints

### 🔐 Autenticação

#### POST `/api/v1/login`

Realiza o login do usuário.

**Body (form-data):**

-   `login`: E-mail do usuário.
-   `senha`: Senha do usuário.

**Exemplo:**
User esse login:

```
login = test@example.com
senha = 12345678
```

**Retorno:**

-   Token de autenticação e dados do usuário.

---

#### POST `/api/v1/logout`

Encerra a sessão do usuário autenticado.

**Cabeçalho:**

-   Authorization: `Bearer {token}`

---

#### GET `/api/v1/usuario`

Retorna os dados do usuário autenticado.

**Cabeçalho:**

-   Authorization: `Bearer {token}`

---

### 🚚 Cotações

#### GET `/api/v1/cotacao/frete`

Retorna cotações de frete com base em parâmetros.

**Parâmetros de consulta (query):**

-   `peso_inicial` (número): Peso inicial.
-   `peso_final` (número): Peso final.
-   `cep_inicio` (número): CEP de origem.
-   `cep_final` (número): CEP de destino.

---

#### GET `/api/v1/cotacao/rapida/{id}`

Retorna cotações pré-definidas de forma paginada.

**Parâmetros de consulta (query):**

-   `page` (número): Página da paginação (10 itens por página).

---

## 📝 Observações

-   É necessário estar autenticado para acessar os endpoints protegidos (`logout`, `usuario`, `/cotacao/rapida/{id}`, `/cotacao/frete`).
-   Certifique-se de rodar os seeders para que os endpoints de cotação funcionem corretamente.

---
