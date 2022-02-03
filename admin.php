index = Lorsqu’une partie commence, un mot est choisi aléatoirement dans le fichier mots.txt.
La page affiche alors autant d’éléments (espaces vides, tirets, étoiles, images…) qu’il y a de
lettres dans le mot secret choisi.
Le joueur peut choisir, une lettre parmi les 26 qui composent l’alphabet (latin) et la renseigner
dans un “input” (ou assimilé).
Si le mot secret contient une ou plusieurs occurrences de la lettre renseignée par l’utilisateur,
celles-ci sont découvertes et affichées à leur position correspondante.
Si le mot secret ne contient aucune occurrence de la lettre choisie par le joueur, le dessin du
pendu s’enrichit d’un membre.
Un historique comporte l’ensemble des propositions faites.
La partie se termine quand toutes les lettres ont été trouvées (Victoire) ou quand le bonhomme
est pendu (Défaite). Un message spécifique apparaît alors et incite l’utilisateur à faire une
nouvelle partie


admin = Gestion des mots :
Une page d’administration permet d’ajouter et de supprimer des mots. Les mots ne peuvent
contenir que des lettres. Il doit toujours y avoir au moins un mot dans la liste. Un mot ne peut
être présent qu’une fois dans la liste