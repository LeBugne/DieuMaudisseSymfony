<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214221323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE evaluations (id INT AUTO_INCREMENT NOT NULL, commentaire VARCHAR(2056) DEFAULT NULL, note INT DEFAULT NULL, id_utilisateur_id INT DEFAULT NULL, INDEX IDX_3B72691DC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, date_inscription DATE NOT NULL, id_utilisateur_id INT NOT NULL, id_liste_attente_id INT NOT NULL, INDEX IDX_5E90F6D6C6EE5C49 (id_utilisateur_id), INDEX IDX_5E90F6D6DB4092B8 (id_liste_attente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE liste_attente (id INT AUTO_INCREMENT NOT NULL, status_attente INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE litige (id INT AUTO_INCREMENT NOT NULL, descr_litige VARCHAR(2056) DEFAULT NULL, status_litige INT DEFAULT NULL, id_administrateur_id INT DEFAULT NULL, INDEX IDX_EEE9D46D8FD2282B (id_administrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE prestations (id INT AUTO_INCREMENT NOT NULL, descr_prestation VARCHAR(2056) DEFAULT NULL, cout_prestation INT DEFAULT NULL, date_debut DATE DEFAULT NULL, id_litige_id INT DEFAULT NULL, id_liste_attente_id INT DEFAULT NULL, id_evaluation_id INT DEFAULT NULL, id_fournisseur_id INT DEFAULT NULL, id_client_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_B338D8D19AF97B4D (id_litige_id), UNIQUE INDEX UNIQ_B338D8D1DB4092B8 (id_liste_attente_id), UNIQUE INDEX UNIQ_B338D8D1FB448723 (id_evaluation_id), INDEX IDX_B338D8D15A6AC879 (id_fournisseur_id), INDEX IDX_B338D8D199DED506 (id_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE pret (duree_pret INT DEFAULT NULL, status_pret INT DEFAULT NULL, id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, date_reclamation DATE DEFAULT NULL, id_utilisateur_id INT NOT NULL, id_litige_id INT NOT NULL, INDEX IDX_CE606404C6EE5C49 (id_utilisateur_id), INDEX IDX_CE6064049AF97B4D (id_litige_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE services (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE utilisateur (nb_florains INT DEFAULT NULL, status_abonnement INT DEFAULT NULL, status_activites INT DEFAULT NULL, id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8BF396750 FOREIGN KEY (id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evaluations ADD CONSTRAINT FK_3B72691DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DB4092B8 FOREIGN KEY (id_liste_attente_id) REFERENCES liste_attente (id)');
        $this->addSql('ALTER TABLE litige ADD CONSTRAINT FK_EEE9D46D8FD2282B FOREIGN KEY (id_administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D19AF97B4D FOREIGN KEY (id_litige_id) REFERENCES litige (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D1DB4092B8 FOREIGN KEY (id_liste_attente_id) REFERENCES liste_attente (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D1FB448723 FOREIGN KEY (id_evaluation_id) REFERENCES evaluations (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D15A6AC879 FOREIGN KEY (id_fournisseur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D199DED506 FOREIGN KEY (id_client_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE979BF396750 FOREIGN KEY (id) REFERENCES prestations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064049AF97B4D FOREIGN KEY (id_litige_id) REFERENCES litige (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169BF396750 FOREIGN KEY (id) REFERENCES prestations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3BF396750 FOREIGN KEY (id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8BF396750');
        $this->addSql('ALTER TABLE evaluations DROP FOREIGN KEY FK_3B72691DC6EE5C49');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6C6EE5C49');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DB4092B8');
        $this->addSql('ALTER TABLE litige DROP FOREIGN KEY FK_EEE9D46D8FD2282B');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D19AF97B4D');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D1DB4092B8');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D1FB448723');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D15A6AC879');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D199DED506');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE979BF396750');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C6EE5C49');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064049AF97B4D');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169BF396750');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3BF396750');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE evaluations');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE liste_attente');
        $this->addSql('DROP TABLE litige');
        $this->addSql('DROP TABLE prestations');
        $this->addSql('DROP TABLE pret');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE personne DROP type');
    }
}
