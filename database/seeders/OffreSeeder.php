<?php

namespace Database\Seeders;

use App\Models\Offre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offres = [
            [
                "libelle" => "Stage en développement web frontend",
                "description" => "Vous serez impliqué dans la création d'interfaces utilisateur attrayantes et interactives pour les applications web. Vous travaillerez avec des technologies telles que HTML, CSS et JavaScript.",
                "entreprise_id" => 1
            ],
            [
                "libelle" => "Stage en développement web backend avec Python",
                "description" => "Ce stage vous permettra de découvrir le développement backend en utilisant le langage de programmation Python. Vous travaillerez sur des frameworks populaires comme Django ou Flask pour créer des API et des applications web robustes et évolutives.",
                "entreprise_id" => 2
            ],
            [
                "libelle" => "Stage en développement d'applications mobiles iOS",
                "description" => "En tant que stagiaire, vous apprendrez à créer des applications iOS en utilisant le langage de programmation Swift. Vous travaillerez sur divers projets pour concevoir et développer des applications mobiles pour iPhone et iPad, en respectant les meilleures pratiques de développement iOS.",
                "entreprise_id" => 3
            ],
            [
                "libelle" => "Stage en développement d'applications mobiles Android",
                "description" => "Ce stage vous initiera au développement d'applications Android en utilisant Java ou Kotlin. Vous participerez à la conception et à la mise en œuvre d'applications mobiles pour les appareils Android, en vous concentrant sur la performance, la convivialité et la compatibilité.",
                "entreprise_id" => 4
            ],
            [
                "libelle" => "Stage en développement de jeux vidéo",
                "description" => "Dans ce stage, vous explorerez le processus de développement de jeux vidéo. Vous travaillerez sur la conception, le développement et le test de jeux vidéo en utilisant des moteurs de jeu populaires tels que Unity ou Unreal Engine. Vous aurez l'occasion d'acquérir une expérience pratique dans un environnement de développement de jeux.",
                "entreprise_id" => 5
            ],
            [
                "libelle" => "Stage en data science",
                "description" => "Ce stage vous plongera dans le domaine de la science des données. Vous apprendrez à collecter, nettoyer, analyser et visualiser des données en utilisant des outils et des bibliothèques populaires comme Python, Pandas et Matplotlib. Vous travaillerez sur des projets réels pour résoudre des problèmes commerciaux concrets à l'aide de données.",
                "entreprise_id" => 6
            ],
            [
                "libelle" => "Stage en cybersécurité",
                "description" => "En tant que stagiaire en cybersécurité, vous explorerez les concepts et les pratiques de la cybersécurité. Vous serez impliqué dans la détection et la prévention des cyberattaques, la sécurisation des réseaux et des systèmes informatiques, ainsi que dans l'évaluation des vulnérabilités et des risques de sécurité.",
                "entreprise_id" => 7
            ],
            [
                "libelle" => "Stage en développement de logiciels embarqués",
                "description" => "Ce stage vous permettra d'acquérir une expérience pratique dans le développement de logiciels pour des systèmes embarqués tels que les microcontrôleurs et les systèmes embarqués IoT. Vous travaillerez sur la conception, le développement et le test de logiciels embarqués pour des applications dans divers domaines, y compris l'automobile, l'électronique grand public et l'industrie.",
                "entreprise_id" => 8
            ],
            [
                "libelle" => "Stage en intelligence artificielle",
                "description" => "En tant que stagiaire en intelligence artificielle, vous explorerez les fondamentaux de l'intelligence artificielle et de l'apprentissage automatique. Vous serez impliqué dans la collecte et la préparation de données, la création et l'évaluation de modèles d'apprentissage automatique, ainsi que dans l'application de techniques d'IA pour résoudre des problèmes du monde réel.",
                "entreprise_id" => 9
            ],
            [
                "libelle" => "Stage en génie logiciel",
                "description" => "Ce stage vous offrira une expérience pratique dans le domaine du génie logiciel. Vous travaillerez sur le cycle de vie complet du développement logiciel, y compris la collecte des exigences, la conception, le développement, les tests et la maintenance. Vous serez exposé à diverses technologies et méthodologies de développement logiciel pour créer des applications de qualité.",
                "entreprise_id" => 10
            ]
        ];

        foreach ($offres as $offre) {
            Offre::create($offre);
        }
    }
}
