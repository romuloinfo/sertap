<div class="row justify-content-center">
  <div class="col col-12 border-top border-bottom py-1">
    <div class="col col-12 bg-titulo text-left">
      <span class="text-secondary ">Faça uma busca de imóveis personalizada</span>
    </div>

    <form>
      <div class="form-row align-items-center">

        <div class="col col-sm-6 mb-1 my-1">
          <input type="text" class="form-control tooltip-test" id="codigo" name="codigo" placeholder="Código">
        </div>

        <div class="col col-12 col-sm-6 my-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="tipo" name="tipo" class="form-control">
            <option selected value="">Tipo...</option>
            <option value="0">Aluguel</option>
            <option value="1">Venda</option>
          </select>
        </div>

        <div class="col col-12 col-sm-6 my-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="categoria" name="categoria" class="form-control">
            <option selected value="">Categoria...</option>
            <?php
              buscar_categorias();
              ?>
          </select>
        </div>

        <div class="col col-12 col-sm-6 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="cidade" name="cidade" class="form-control">
            <option selected value="">Cidade...</option>
            <option value="3290">Janaúba</option>
              <?php
                buscar_cidades();
              ?>
          </select>
        </div>

        <div class="col col-12 col-sm-6 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="bairro" name="bairro" class="form-control">
            <option selected value="">Bairro...</option>
              <?php
                buscar_bairros();
              ?>
          </select>
        </div>

        <div class="col col-12 col-sm-6 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select class="form-control " id="quarto" name="quarto">
            <option selected>Quartos...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>

        <div class="col col-12 col-sm-6 mb-1">
          <select class="form-control" id="suite" name="suite">
            <option selected>Suítes...</option>
            <option value="0">Sem Suíte</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>

        <div class="col col-12 col-sm-6 mb-1">
          <select class="form-control" id="banheiro" name="banheiro">
            <option selected>Banheiros...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>

        <div class="col col-12 col-sm-6 mb-1">
          <select class="form-control" id="garagem" name="garagem">
            <option selected>Garagem...</option>
            <option value="0">Sem Garagem</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>

        
        <div class="col col-12 col-sm-6 mb-1">
          <select class="form-control" id="garagem" name="garagem">
            <option selected>Banheiro...</option>
            <option value="0">Sem Garagem</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>        

        <div class="col col-6 col-sm-6 mb-1">
          <!-- <input type="text" class="form-control" title="Preço Máximo" id="max" name="max" placeholder="R$ Máx"> -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend2">R$</span>
            </div>
            <input type="number" class="form-control" id="preco_min" name="preco_min" placeholder="Preço Mínimo" aria-describedby="inputGroupPrepend2">
          </div>
        </div>

        <div class="col col-6 col-sm-6 mb-1">
          <!-- <input type="text" class="form-control" title="Preço Máximo" id="max" name="max" placeholder="R$ Máx"> -->
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupPrepend2">R$</span>
            </div>
            <input type="number" class="form-control" id="preco_max" name="preco_max" placeholder="Preço Máximo" aria-describedby="inputGroupPrepend2">
          </div>
        </div>
      
        <div class="col col-6 col-sm-6 mb-1">
          <!-- <label for="inputEmail4">Email</label> -->
          <input type="number" class="form-control" id="area_minima" name="area_minima" placeholder="Área (m²): Mínimo">
        </div>

        <div class="col col-6 col-sm-6 mb-1">
          <!-- <label for="inputPassword4">Senha</label> -->
          <input type="number" class="form-control" id="area_maxima" name="are_maxima" placeholder="Área (m²): Máximo">
        </div>
      
        <div class="col col-12 mb-1">
          <button type="submit" class="btn btn-success btn-block"><i class="fas fa-search"></i> Pesquisar</button>
        </div>
          
      </div> <!-- formrow -->
      
    </form>

  </div>  <!-- col -->
</div> <!-- row -->