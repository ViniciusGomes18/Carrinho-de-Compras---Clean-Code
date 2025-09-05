# Carrinho de Compras - Desing Patterns e Clean Code
### *Vinicius da Silva Gomes - 2010424 | Miguel Guarnetti - 1999154*
----
## 🖥 Instruções para Execução
1. Instale o **XAMPP** (Caso não tenha instalado)
2. Execute o **XAMPP** e inicie o **APACHE**
3. Copie o projeto para a pasta 'htdocs' do XAMPP - *Exemplo:* C:\xampp\htdocs
4. Acesse no navegador: (http://localhost/carrinho)
----
## ⚙ Funcionalidades Implementadas
- Listagem de produtos disponíveis com nome, preço e estoque 
- Adicionar produtos ao carrinho com verificação de disponibilidade de estoque
- Remover produtos do carrinho com devolução ao estoque
- Visualizar itens do carrinho (mostrando quantidade, preço unitário, subtotal e total)
- Aplicação de cupom de desconto
----
## 📊 Regras de Negócio
- Um produto só pode ser adicionado ao carrinho se houver estoque disponível
- Quando o produto é adicionado, o estoque é reduzido
- Ao remover um produto do carrinho, o estoque volta para a quantidade original
- Apenas o cupom de desconto **DESCONTO10** é válido no momento
----
## 🛑 Limitações
- Os produtos estão armazenados em mémoria local (Não tem banco de dados)
- Não há interface gráfica (Somente execução do script no navegador)
- Não há controle de usuário (login/cadastro)
----
## 🚧 Casos de Uso
**Caso 1 - Usuário adiciona produto válido** 
- Entrada: produto id = 1, quantidade = 2
- Resultado esperado: O produto é adicionado ao carrinho e o estoque é reduzido

**Caso 2 - Usuário adiciona além do estoque** 
- Entrada: produto id = 3, quantidade = 10
- Resultado esperado: Mensagem de erro "Estoque insuficiente"

**Caso 3 - Usuário remove um produto do carrinho**
- Entrada: produto id = 1;
- Resultado esperado: O produto é removido do carrinho e o estoque volta ao valor original

**Caso 4 - Aplicando o cupom de desconto**
- Entrada: cupom DESCONTO10
- Resultado esperado: O valor total da compra final é reduzida em 10%
