<style>
    p {
  margin: 0 0 13px 0;
}

a {
  color: #fff;
}

.center { text-align: center; }

.container {
  width: 95%;
  max-width: 1220px;
  margin: 0 auto;
}

.episode {
  display: grid;
  grid-template-columns: 1fr 3fr;
  position: relative;
}

.episode__number {
  font-size: 6vw;
  font-weight: 600;
  padding: 10px 0;
  position: sticky;
  top: 0;
  text-align: center;
  height: calc(10vw + 20px);
  transition: all 0.2s ease-in;
}

.episode__content {
  border-top: 2px solid #fff;
  display: grid;
  grid-template-columns: 1fr 4fr;
  grid-gap: 10px;
  padding: 15px 0;
}

.episode__content .title {
  font-weight: 600
}

.episode__content .story {
  line-height: 26px;
}

@media (max-width: 600px) {
  .episode__content {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 576px) {
  .episode__content .story {
    font-size: 15px;
  }
}
</style>

<div style="background-color: rgb(0, 0, 0)" class="main-panel">
   <h1 style="font-size:25px" class="text-center font-weight-bold mt-5 mb-4">Bienvenue chef !</h1>
   <div class="container">
    <h1 class="center mb-4">Voici votre gestionnaire des élèments de votre site et sa documentation</h1>

    <article class="episode">
      <div class="episode__number">00</div>
      <div class="episode__content">
        <div class="title">Introduction</div>
        <div class="story">
          <p>Vous trouverez la navigation de votre gestionnaire à gauche.</p>
          <p>Les différentes options se trouvents dans chaque categorie</p>
          <p>Cliquez dessus pour les afficher.</p>
        </div>
      </div>
    </article>

    <article class="episode">
      <div class="episode__number">01</div>
      <div class="episode__content">
        <div class="title">Produits</div>
        <div class="story">
          <p>Vous pouvez y modifier, créer ou supprimer les produits de votre boutique</p>
          <p>Mais avant celà je vous invite à tout dabord créer les différents catégorie de ce ces produits.</p>
          <p>Création: Vous y verrez les différents paramètres des produits, toute les informations sont obligatoires, ormis le prix promotionnel.</p>
          <p>Pour éditer ou supprimer un ou des produits cliquez sur voir produits.</p>
          <p>Edition: pour celà, une fois sur "voir produits", cliquez sur "Mettre à jour" sur la ligne du produit que vous voulez modifier. Une page se chargera avec les informations
              du produit, ne modifier que les élements que vous voulez modifier et cliquer sur "Modifier".
          </p>
          <p>Suppresion: Pareil que pour l'édition et cliquer sur "Supprimer".</p>
        </div>
      </div>
    </article>

    <article class="episode">
      <div class="episode__number">02</div>
      <div class="episode__content">
        <div class="title">Categories</div>
        <div class="story">
          <p>Vous trouverez toute les options en rapport en cliquant sur categories et puis "Ajouter une categorie.</p>
          <p>Pour la crétion, il vous suffira de rentrer le nom de la catégorie, pensez à rentrer à le rentrer une deuxième fois en minuscule (ça servira pour le lien des pages) et puis une abriéviation et de cliquer sur "Ajouter". La catégorie est crée !</p>
          <p>Pour la suppresion dans la même page que pour la création vous trouverez sur la ligne voulu le bouton "Supprimer" pour effectuer cette action.</p>
        </div>
      </div>
    </article>

    <article class="episode">
      <div class="episode__number">03</div>
      <div class="episode__content">
        <div class="title">Commandes</div>
        <div class="story">
          <p>En travaux</p>
          <p>En travaux</p>
          <p>En travaux</p>
          <p>En travaux </p>
          <p>En travaux</p>
        </div>
      </div>
    </article>
  </div>
    <h3 class="center mb-3"><a href="https://www.linkedin.com/in/michaelmasdev/" target="_blank" rel="noopener noreferer">Tutoriel réalisé par Michael Mas</a></h3>
    <!-- content-wrapper ends -->
