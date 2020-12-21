module Api
    class NotesController < ApplicationController
        def index
            notes = Note.order('created_at DESC');
            render json: {status: 'SUCCESS', message:'Merkinnät haettu', data:notes},status: :ok
            
        end

        def show
            note = Note.find(params[:id])
            render json: {status: 'SUCCESS', message:'Merkintä haettu', data:note},status: :ok
        end

        def create
            note = Note.new(note_permitted)
            if note.save
                render json: {status: 'SUCCESS', message:'Merkintä tallennettu', data:note},status: :ok
            else
                render json: {status: 'ERROR', message:'Merkintä ei tallentunut', data:note.errors},status: :unprocessable_entity
            end
        end
                
        def destroy  
            note = Note.find(params[:id])
            note.destroy
            if note.destroy
                render json: {status: 'SUCCESS', message:'Merkintä tuhottu', data:note},status: :ok
            else
                render json: {status: 'ERROR', message:'Mitään ei tuhottu', data:note.errors},status: :unprocessable_entity
            end
        end

        def update
            note = Note.find(params[:id])
            if note.update_attributes(note_permitted)
                render json: {status: 'SUCCESS', message:'Merkintä muutettu', data:note},status: :ok
            else
                render json: {status: 'ERROR', message:'Merkintää ei voitu muuttaa', data:note.errors},status: :unprocessable_entity
            end
    end

        private

        def note_permitted
            params.permit(:nimi, :kuvaus, :tunnit, :luokitus)
        end
    end
end
