import {React} from 'react'

const Delete = (event, props) => {
  event.preventDefault()
  const url = props[1] + props[0]
  const id = props[0]

  fetch(url, {
    method: 'DELETE',
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      id: id
    }),
  })
  .then(response => console.log(`Status: ${response.status}`))
  .catch(e => console.log(e))
}

const ListItem = (props) =>{

  return (
    <div>
          {props.data.map(item =>   
            <ul key={item.id} className="Osio">
              <li className="Nimi">{item.nimi}</li>
              <li className="Kuvaus">{item.kuvaus}</li>
              <li className="Tunnit">{item.tunnit}</li>
              <li className="Luokitus">{item.luokitus}</li>
              <button className="Poista" onClick={e => Delete(e, [item.id, props.url])}>Poista</button>
            </ul>
          )
        }
    </div>
  )
}

export default ListItem