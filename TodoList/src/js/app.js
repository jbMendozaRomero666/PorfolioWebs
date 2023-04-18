const btnEnviar = document.getElementById('btnEnviar');
const nombre = document.getElementById('nombre');
const app = document.getElementById('app');

let task = JSON.parse(localStorage.getItem('task')) || [];

showTaskList();
//!guardar en localStorage
function saveTask() {
  localStorage.setItem('task', JSON.stringify(task));
}

nombre.addEventListener('input', evaluar);

function evaluar(e) {
  // console.log(e.target.value.length)
  if (e.target.value.length < 4) {
    btnEnviar.disabled = true;
    btnEnviar.style.opacity = .5;
    return;
  }
  btnEnviar.disabled = false;
  btnEnviar.style.opacity = 1;
}

btnEnviar.addEventListener('click', newtaskList);

function newtaskList() {
  limpiarHtml();
  let newTask = nombre.value;
  const tasks = {
    id: new Date().getTime(),
    nombre: newTask,
    estado: false
  }

  task.push(tasks);
  saveTask();
  showTaskList();
}

function showTaskList() {
  limpiarHtml();
  task.forEach(task => {
    let {
      id,
      nombre,
    } = task;

    //? scripting <p>${estado}</p>
    // <p>${id}</p>
    let div = document.createElement('DIV');
    div.classList.add('task');
    div.innerHTML = `
              <ul>
                 <li>
                    <p  onclick="updateTaskList(${id})" class="${task.estado ? 'red' : 'remove'}">${nombre}</p>
                    <button type="submit" onclick="Taskstatus(${id})" class="${task.estado ? 'BtnTareaCompletada' : 'BtnTareaPendiente'}">${task.estado ? 'Completada' : 'En Proceso'}</button>
                    <button type="submit" id="BtnEliminar" onclick="TaskEliminar(${id})" ${task.estado ? 'style="opacity: 1;"' : 'disabled'}>Eliminar</button> 
                 </li>
              </ul> 
    `;
    app.appendChild(div);

  });
}

function limpiarHtml() {
  while (app.firstChild) {
    app.removeChild(app.firstChild);
  }
}

function Taskstatus(id) {

  pruebas = task.filter(task => task.id == id);

  pruebas.forEach(pruebas => {

    let {
      estado
    } = pruebas;
    if (estado === false) {
      pruebas.estado = true;
      return;
    }
    pruebas.estado = false;
  });
  saveTask();
  showTaskList();
}

function TaskEliminar(id) {

  task = task.filter(task => task.id !== id);

  saveTask();
  showTaskList();
}

function updateTaskList(id) {

  update = task.filter(task => task.id == id);

  update.forEach(update => {

    const cambio = prompt('cambio', update.nombre);
    update.nombre = cambio;

  })
  saveTask();
  showTaskList();
}