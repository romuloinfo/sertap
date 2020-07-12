<?php
include 'superior.php';
?>
<br><br>
<h1>Fale com um representante da SERTAP IMÓVEIS</h1>
<br>
<form>
    <table>
        <tr>
            <td>Assunto</td>
            <td><select>
                    <option>Agendar Visita a um imóvel</option>
                    <option>Interessado em comprar um imóvel</option>
                    <option>Interessado em alugar um imóvel</option>
                    <option>Outros</option>
                </select></td>
        </tr>
        <tr>
            <td>Nome</td>
            <td><input name="nome" size="30"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input name="email" size="30"></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><input name="telefone" size="30"></td>
        </tr>
        <tr>
            <td>Mensagem</td>
            <td><textarea cols="60" rows="10"></textarea></td>
        </tr>  
        <tr>
            <td><input type="submit" name="enviar" value="Enviar"</td>
        </tr>
    </table>
    
</form>

<?php
include 'inferior.php';
?>

