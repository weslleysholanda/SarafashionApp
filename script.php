<?php
 
function menu() {
    echo "=========================\n";
    echo " 1 - Gerar hash da senha\n";
    echo " 2 - Validar senha com hash\n";
    echo " 0 - Sair\n";
    echo "=========================\n";
    echo "Escolha uma opção: ";
}
 
do {
    menu();
    $opcao = trim(fgets(STDIN));
 
    switch ($opcao) {
        case '1':
            echo "\nDigite a senha para gerar o hash: ";
            $senha = trim(fgets(STDIN));
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            echo "\n🔐 Hash gerado:\n$hash\n\n";
            break;
 
        case '2':
            echo "\nDigite a senha: ";
            $senha = trim(fgets(STDIN));
            echo "Digite o hash: ";
            $hash = trim(fgets(STDIN));
 
            if (password_verify($senha, $hash)) {
                echo "\n✔️ Senha válida!\n\n";
            } else {
                echo "\n❌ Senha inválida.\n\n";
            }
            break;
 
        case '0':
            echo "Saindo...\n";
            break;
 
        default:
            echo "Opção inválida. Tente novamente.\n";
            break;
    }
 
} while ($opcao !== '0');