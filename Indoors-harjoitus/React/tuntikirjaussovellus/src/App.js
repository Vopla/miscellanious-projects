import './App.css';
import React, { useState } from 'react'
import Form from './components/FormHandling'
import ListItem from './components/ItemListing'
import {Otsikko, Header} from './components/Headers'

function App() {
  const [data, setData] = useState([])
  const [isloaded, setLoaded] = useState(false)
  const url = "http://127.0.0.1:3000/api/notes/"
  
  if (!isloaded){
  fetch(url)
  .then(response => response.json())
  .then(merkinta => setData(merkinta.data))
  .finally(setLoaded(true))
  }

  return (

    <div className="App">
      <Header text="Tuntikirjasovellus" className="Header"></Header>
        <Form url = {url}></Form>
      <div className="Otsikot">
        <Otsikko text="Nimi"></Otsikko>
        <Otsikko text="Kuvaus"></Otsikko>
        <Otsikko text="Tunnit"></Otsikko>
        <Otsikko text="Luokitus"></Otsikko>
      </div>
      <ListItem data={data}></ListItem>
    </div>
    
  );
}

export default App;
