import React from 'react'

const ListItem = (props) =>{
    const data = props.data

  return (
    <div>
          {data.map(item => 
            <ul key={item.id} className="Osio">
              <li className="Nimi">{item.nimi}</li>
              <li className="Kuvaus">{item.kuvaus}</li>
              <li className="Tunnit">{item.tunnit}</li>
              <li className="Luokitus">{item.luokitus}</li>
            </ul>
          )}
    </div>

  )
}

export default ListItem