class Note < ApplicationRecord
    validates :nimi, presence: true
    validates :kuvaus, presence: true
    validates :tunnit, presence: true
    validate :luokitus    
end
