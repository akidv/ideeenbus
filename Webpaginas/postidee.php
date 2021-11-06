<?php include_once '../Referentiepaginas/checkloginstatus.php' ?>
<?php include_once '../Referentiepaginas/htmlhead.php' ?>
<div id="paginaFlexContainer">
<?php include_once '../Referentiepaginas/header.php' ?>

<div class="paginaFlexMain">
    <div class="height100 margin0">
        <div class="" id="postideeContainer">
            <?php include_once '../Referentiepaginas/navigatie.php'; ?>
            <!--<p class="" id="titelPostIdeeId"></p>-->
                <form action="../Tussenpaginas/postnaarrecente.php" method="POST" id="formPostIdee">
                    <label for="tekstIdee" class="" id="labelPostIdee">Deel jouw idee!</label>
                    <textarea name="tekstIdee" rows="5" maxlength="800" class="" id="textareaPostIdeeId" placeholder="Omschrijving idee."></textarea>
                    <label for="domeinIdee" class="" id="labelPostDomein">Onderwerp</label>
                    <select name="domeinIdee" class="" id="selectPostIdeeId">
                        <option value="algemeen">Algemeen</option>
                        <option value="gebouw">Gebouw</option>
                        <option value="roosters">Roosters</option>
                        <option value="activiteiten">Activiteiten</option>
                        <option value="studentenraad">Studentenraad</option>
                        <option value="afstandsleren">Afstandsleren</option>
                        <option value="motivatie">Motivatie</option>
                        <option value="docenten">Docenten</option>
                        <option value="lesinhoud">Lesinhoud</option>
                        <option value="catering">Catering</option>
                        <option value="sport">Sport</option>
                    </select><br>
                    <input type="submit" name="submitIdee" value="Post" id="submitPostIdeeId" class="standaardInput hoverGroen"><br><br>
                </form>
        </div>
    </div>
</div>

<?php include_once '../Referentiepaginas/footer.php' ?>