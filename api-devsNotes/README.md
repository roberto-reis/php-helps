DEVSNOTES: (Sistema de anotações simples)

O que o projeto precisa fazer?
- Lista as anotações
- Pegar informações de uma anotação
- Inserir uma anotação nova
- Atuializar uma anotação
- Deletar uma anotação

Qual a estrutura de dados?
- Local para armazenar as anotações
-- id
-- title
-- body

Quais os endpoints?
- (GET) /api/notes - /api/getall.php
- (GET) /api/note/123 - /api/get.php?id=123 (id)
- (POST) /api/note - /api/insert.php (title, body)
- (PUT) /api/note/123 - /api/update.php (title, body)
- (DELETE) /api/note/123 - /api/delete.php (id)