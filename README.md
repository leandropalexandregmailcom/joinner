# Joinner Sistemas #

## Teste de desenvolvimento ##

Obrigado por participar do nosso processo seletivo. Este teste serve para conhecermos melhor o candidato no quesito técnico.

Não vamos exigir muito esforço, é um teste simples, mas capricho é bem vindo.

Por favor, não poupe esforços para nos mostrar o seu conhecimento. 

### Especificações do Teste ###

O teste deve ser feito com Laravel e consiste em um cadastro de Pessoa, uma grid e um formulário simples com poucos campos. 

O banco de dados deve ter uma tabela para o cadastro de países, com um campo de nome apenas e uma tabela para o cadastro de pessoas com os campos: nome, nascimento, genero e relacionamento com a tabela de paises. 

Abaixo, as especificações de funcionamento do cadastro:

 - A visualização do cadastro deve ser iniciada com uma Grid exibindo os registros já cadastrados, com a possibilidade de Criar um novo registro, Editar ou Excluir um registro já existente;
 - As ações de Criar e Editar devem acontecer em um formulário aberto em uma Modal por cima da Grid, para que o usuário possa efetuar as alterações desejadas;
 - A ação de exclusão deve ter uma confirmação;
 - Não é necessário criar o cadastro de País, apenas de Pessoa;
 - O campo `id` da tabela de Pessoa deve ser preenchido com sequence;
 - O campo `genero` deve ser preenchido com "Masculino", "Feminino" ou "Não informado". Onde a última opção pode ser salva como NULL no banco.

Bibliotecas:

 - Usar Bootstrap 4 para formatar o layout. Não precisa ser um layout completo, apenas o básico do formulário e da grid;
 - Gostaríamos que fossem usados componentes da biblioteca Kendo UI for jQuery, como por exemplo [KendoGrid](https://demos.telerik.com/kendo-ui/grid/index) para a grid. Você pode ver como utilizar a biblioteca [neste link](https://docs.telerik.com/kendo-ui/intro/first-steps). 

    Dica: Existe um *sandbox* para a biblioteca [neste link](https://dojo.telerik.com/), nele é possível ver como são incluídos os arquivos JS e CSS da biblioteca no código por meio de um CDN. Por comodidade, recomendamos utilizar da mesma forma no projeto.
 
### Diferenciais ###

Os itens abaixo não são obrigatórios mas contam muito como diferenciais:

 - Código limpo, organizado e bem reutilizado;
 - Uso de Web Standards;
 - Padrões modernos de UX(e.g. inputs de HTML5);
 - Validação de dados (Front e/ou Back-end);
 - Uso de transações;
 - Uso de migrations;
 - Uso do componente de Grid do Kendo, apesar de não obrigatório, conta bastante!
 
 **Boa sorte e obrigado por participar!**