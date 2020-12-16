import './App.css';
import React, { useState } from 'react'


const ListItem = (props) =>{
    const data = props.data

  return (
    <div>
          {data.map(item => 
            <tr className="TableRow" key={item.idj}>
              <td>{item.nimi}</td>
              <td>{item.kuvaus}</td>
              <td>{item.tunnit}</td>
              <td>{item.luokitus}</td>
            </tr>
          )}
    </div>

  )
}

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
      <table>
        <ListItem data={data}></ListItem>
      </table>
        {url}
    </div>
    
  );
}

export default App;
