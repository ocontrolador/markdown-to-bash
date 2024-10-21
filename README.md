# Markdown to Bash

  Converte Markdown para texto formatado para o terminal.

  ## Instalação

```bash
   composer require diaslasd/markdown-to-bash
```

  ## Uso
```php
   <?php

   use Diaslasd\MarkdownToBash;

   $markdown = "# Título\n\nUm texto qualquer.\n\n- Item 1\n- Item 2";

   $markdownToBash = new MarkdownToBash();
   $output = $markdownToBash->convert($markdown);

   echo $output;

   ?>
```

   ## Testes

```bash
composer test
```

