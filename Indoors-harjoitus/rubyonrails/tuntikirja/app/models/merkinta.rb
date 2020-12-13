class Merkinta < ApplicationRecord
    validates :nimi, presence: true
    validates :kuvaus, presence: true
    validates :luokitus, presence:true
end
