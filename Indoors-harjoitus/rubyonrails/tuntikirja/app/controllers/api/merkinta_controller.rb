module Api
    class MerkintaController < ApplicationController
        def index
            merkinnat = Merkinta.order('created_at DESC');
            render json:{status: 'SUCCESS', message:'Merkinnät haettu', data:merkinnat},status: :ok
        end

        def show
            merkinta = Merkinta.find(params[:id])
            render json:{status: 'SUCCESS', message:'Merkintä haettu', data:merkinta},status: :ok
        end

        def create
            merkinta = Merkinta.new(merkinta_tiedot)
            if merkinta.save
                render json:{status: 'SUCCESS', message:'Merkintä tallennettu', data:merkinta},status: :ok
            else
                render json:{status: 'ERROR', message:'Merkintä ei tallentunut', data:merkinta.errors},status: :unprocessable_entity
            end
        end
                
        def destroy  
            merkinta = Merkinta.find(params[:id])
            merkinta.destroy
            if merkinta.destroy
                render json:{status: 'SUCCESS', message:'Merkintä tuhottu', data:merkinta},status: :ok
            else
                render json:{status: 'ERROR', message:'Mitään ei tuhottu', data:merkinta.errors},status: :unprocessable_entity
            end
        end

        def update
            merkinta = Merkinta.find(params[:id])
            if merkinta.update_attributes(merkinta_tiedot)
                render json:{status: 'SUCCESS', message:'Merkintä muutettu', data:merkinta},status: :ok
            else
                render json:{status: 'ERROR', message:'Merkintää ei voitu muuttaa', data:merkinta.errors},status: :unprocessable_entity
            end
    end

        private

        def merkinta_tiedot
            params.permit(:nimi, :kuvaus, :tunnit, :luokitus)
        end
    end
end
