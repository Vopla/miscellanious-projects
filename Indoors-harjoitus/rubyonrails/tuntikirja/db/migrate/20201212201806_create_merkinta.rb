class CreateMerkinta < ActiveRecord::Migration[6.1]
  def change
    create_table :notes do |t|
      t.string :nimi
      t.text :kuvaus
      t.integer :tunnit
      t.string :luokitus

      t.timestamps
    end
  end
end
