<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240214221932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evaluations DROP FOREIGN KEY FK_3B72691DC6EE5C49');
        $this->addSql('DROP INDEX IDX_3B72691DC6EE5C49 ON evaluations');
        $this->addSql('ALTER TABLE evaluations CHANGE id_utilisateur_id utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evaluations ADD CONSTRAINT FK_3B72691DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_3B72691DFB88E14F ON evaluations (utilisateur_id)');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6C6EE5C49');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DB4092B8');
        $this->addSql('DROP INDEX IDX_5E90F6D6DB4092B8 ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D6C6EE5C49 ON inscription');
        $this->addSql('ALTER TABLE inscription ADD utilisateur_id INT NOT NULL, ADD liste_attente_id INT NOT NULL, DROP id_utilisateur_id, DROP id_liste_attente_id');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D638CAC769 FOREIGN KEY (liste_attente_id) REFERENCES liste_attente (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6FB88E14F ON inscription (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D638CAC769 ON inscription (liste_attente_id)');
        $this->addSql('ALTER TABLE litige DROP FOREIGN KEY FK_EEE9D46D8FD2282B');
        $this->addSql('DROP INDEX IDX_EEE9D46D8FD2282B ON litige');
        $this->addSql('ALTER TABLE litige CHANGE id_administrateur_id administrateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE litige ADD CONSTRAINT FK_EEE9D46D7EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('CREATE INDEX IDX_EEE9D46D7EE5403C ON litige (administrateur_id)');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D15A6AC879');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D199DED506');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D19AF97B4D');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D1DB4092B8');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D1FB448723');
        $this->addSql('DROP INDEX UNIQ_B338D8D1FB448723 ON prestations');
        $this->addSql('DROP INDEX UNIQ_B338D8D1DB4092B8 ON prestations');
        $this->addSql('DROP INDEX IDX_B338D8D19AF97B4D ON prestations');
        $this->addSql('DROP INDEX IDX_B338D8D199DED506 ON prestations');
        $this->addSql('DROP INDEX IDX_B338D8D15A6AC879 ON prestations');
        $this->addSql('ALTER TABLE prestations ADD litige_id INT DEFAULT NULL, ADD liste_attente_id INT DEFAULT NULL, ADD evaluation_id INT DEFAULT NULL, ADD fournisseur_id INT DEFAULT NULL, ADD client_id INT DEFAULT NULL, DROP id_litige_id, DROP id_liste_attente_id, DROP id_evaluation_id, DROP id_fournisseur_id, DROP id_client_id');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D11ACCC76A FOREIGN KEY (litige_id) REFERENCES litige (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D138CAC769 FOREIGN KEY (liste_attente_id) REFERENCES liste_attente (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D1456C5646 FOREIGN KEY (evaluation_id) REFERENCES evaluations (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D1670C757F FOREIGN KEY (fournisseur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D119EB6921 FOREIGN KEY (client_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_B338D8D11ACCC76A ON prestations (litige_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B338D8D138CAC769 ON prestations (liste_attente_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B338D8D1456C5646 ON prestations (evaluation_id)');
        $this->addSql('CREATE INDEX IDX_B338D8D1670C757F ON prestations (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_B338D8D119EB6921 ON prestations (client_id)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064049AF97B4D');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C6EE5C49');
        $this->addSql('DROP INDEX IDX_CE606404C6EE5C49 ON reclamation');
        $this->addSql('DROP INDEX IDX_CE6064049AF97B4D ON reclamation');
        $this->addSql('ALTER TABLE reclamation ADD utilisateur_id INT NOT NULL, ADD litige_id INT NOT NULL, DROP id_utilisateur_id, DROP id_litige_id');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064041ACCC76A FOREIGN KEY (litige_id) REFERENCES litige (id)');
        $this->addSql('CREATE INDEX IDX_CE606404FB88E14F ON reclamation (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_CE6064041ACCC76A ON reclamation (litige_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6FB88E14F');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D638CAC769');
        $this->addSql('DROP INDEX IDX_5E90F6D6FB88E14F ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D638CAC769 ON inscription');
        $this->addSql('ALTER TABLE inscription ADD id_utilisateur_id INT NOT NULL, ADD id_liste_attente_id INT NOT NULL, DROP utilisateur_id, DROP liste_attente_id');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DB4092B8 FOREIGN KEY (id_liste_attente_id) REFERENCES liste_attente (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5E90F6D6DB4092B8 ON inscription (id_liste_attente_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6C6EE5C49 ON inscription (id_utilisateur_id)');
        $this->addSql('ALTER TABLE litige DROP FOREIGN KEY FK_EEE9D46D7EE5403C');
        $this->addSql('DROP INDEX IDX_EEE9D46D7EE5403C ON litige');
        $this->addSql('ALTER TABLE litige CHANGE administrateur_id id_administrateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE litige ADD CONSTRAINT FK_EEE9D46D8FD2282B FOREIGN KEY (id_administrateur_id) REFERENCES administrateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_EEE9D46D8FD2282B ON litige (id_administrateur_id)');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D11ACCC76A');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D138CAC769');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D1456C5646');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D1670C757F');
        $this->addSql('ALTER TABLE prestations DROP FOREIGN KEY FK_B338D8D119EB6921');
        $this->addSql('DROP INDEX IDX_B338D8D11ACCC76A ON prestations');
        $this->addSql('DROP INDEX UNIQ_B338D8D138CAC769 ON prestations');
        $this->addSql('DROP INDEX UNIQ_B338D8D1456C5646 ON prestations');
        $this->addSql('DROP INDEX IDX_B338D8D1670C757F ON prestations');
        $this->addSql('DROP INDEX IDX_B338D8D119EB6921 ON prestations');
        $this->addSql('ALTER TABLE prestations ADD id_litige_id INT DEFAULT NULL, ADD id_liste_attente_id INT DEFAULT NULL, ADD id_evaluation_id INT DEFAULT NULL, ADD id_fournisseur_id INT DEFAULT NULL, ADD id_client_id INT DEFAULT NULL, DROP litige_id, DROP liste_attente_id, DROP evaluation_id, DROP fournisseur_id, DROP client_id');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D15A6AC879 FOREIGN KEY (id_fournisseur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D199DED506 FOREIGN KEY (id_client_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D19AF97B4D FOREIGN KEY (id_litige_id) REFERENCES litige (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D1DB4092B8 FOREIGN KEY (id_liste_attente_id) REFERENCES liste_attente (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE prestations ADD CONSTRAINT FK_B338D8D1FB448723 FOREIGN KEY (id_evaluation_id) REFERENCES evaluations (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B338D8D1FB448723 ON prestations (id_evaluation_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B338D8D1DB4092B8 ON prestations (id_liste_attente_id)');
        $this->addSql('CREATE INDEX IDX_B338D8D19AF97B4D ON prestations (id_litige_id)');
        $this->addSql('CREATE INDEX IDX_B338D8D199DED506 ON prestations (id_client_id)');
        $this->addSql('CREATE INDEX IDX_B338D8D15A6AC879 ON prestations (id_fournisseur_id)');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404FB88E14F');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE6064041ACCC76A');
        $this->addSql('DROP INDEX IDX_CE606404FB88E14F ON reclamation');
        $this->addSql('DROP INDEX IDX_CE6064041ACCC76A ON reclamation');
        $this->addSql('ALTER TABLE reclamation ADD id_utilisateur_id INT NOT NULL, ADD id_litige_id INT NOT NULL, DROP utilisateur_id, DROP litige_id');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE6064049AF97B4D FOREIGN KEY (id_litige_id) REFERENCES litige (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_CE606404C6EE5C49 ON reclamation (id_utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_CE6064049AF97B4D ON reclamation (id_litige_id)');
        $this->addSql('ALTER TABLE evaluations DROP FOREIGN KEY FK_3B72691DFB88E14F');
        $this->addSql('DROP INDEX IDX_3B72691DFB88E14F ON evaluations');
        $this->addSql('ALTER TABLE evaluations CHANGE utilisateur_id id_utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evaluations ADD CONSTRAINT FK_3B72691DC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3B72691DC6EE5C49 ON evaluations (id_utilisateur_id)');
    }
}
