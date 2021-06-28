<x-pruebas-layout>

    <livewire:pruebas titulo="Mi título" texto="Mi texto" boton="Haz clic" hace="hace1" />

    <livewire:schoolyear-form 
    
            action="delete"
            :title="__('Delete school year')"
            :desc="__('Permanently delete the school year.')"
            :text="__('Once the school year is deleted, all of its classrooms and relationated data will be permanently deleted. Before deleting the school year, please download any data or information that you wish to retain.')"
            :confirmTxt="__('Are you sure you want to delete the school year? Once the school year is deleted, all of its classrooms and relationated data will be permanently deleted. Before deleting the school year, please download any data or information that you wish to retain.')"
             />

</x-pruebas-layout>