<div class="row justify-content-center">
  <div class="col col-12 border-top border-bottom">
    <div class="col col-12 bg-titulo text-left">
      <span class="text-secondary ">Busca rápida</span>
    </div>
    <form>
      <div class="form-row align-items-center">
        <div class="col col-12 my-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="tipo" name="tipo" class="form-control form-control-sm">
            <option selected value="">Tipo...</option>
            <option value="0">Aluguel</option>
            <option value="1">Venda</option>
          </select>
        </div>

        <div class="col col-12 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="categoria" name="categoria" class="form-control form-control-sm">
            <option selected value="">Categoria...</option>
            <?php
              buscar_categorias();
              ?>
          </select>
        </div>

        <div class="col col-12 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="cidade" name="cidade" class="form-control form-control-sm">
            <option selected value="">Cidade...</option>
            <option value="3290">Janaúba</option>
              <?php
                buscar_cidades();
              ?>
          </select>
        </div>

        <div class="col col-12 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select id="bairro" name="bairro" class="form-control form-control-sm">
            <option selected value="">Bairro...</option>
              <?php
                buscar_bairros();
              ?>
          </select>
        </div>

        <div class="col col-12 mb-1">
          <!-- <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preferência</label> -->
          <select class="form-control form-control-sm" id="quarto" name="quarto">
            <option selected>Quartos...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>

        <div class="col col-12 mb-1">
          <select class="form-control form-control-sm" id="garagem" name="garagem">
            <option selected>Garagem...</option>
            <option value="0">Sem Garagem</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3 ou mais</option>
            <option value="4">4 ou mais</option>
            <option value="5">5 ou mais</option>
          </select>
        </div>

        <div class="col col-12 mb-1">
          <select class="form-control form-control-sm" id="garagem" name="garagem">
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
          <input type="text" class="form-control form-control-sm tooltip-test" title="Preço Mínimo" id="min" name="min" placeholder="R$ Mín">
        </div>

        <div class="col col-6 col-sm-6 mb-1">
          <input type="text" class="form-control form-control-sm tooltip-test" title="Preço Máximo" id="max" name="max" placeholder="R$ Máx">
        </div>
        <div class="col col-12 mb-1">
          <button type="submit" class="btn btn-success btn-block btn-sm"><i class="fas fa-search"></i> Pesquisar</button>
        </div>
      </div>
    </form>
  </div>
</div>