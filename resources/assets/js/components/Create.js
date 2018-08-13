import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Create extends Component {

    constructor(){
        super();
        this.state = {
            name: '',
            deadline_start: '',
            deadline_end: '',
            progress: ''
        }
    }

    handleNameChange(e){
        this.setState({
            name: e.target.value
        })
    }

    handleDeadLineStartChange(e){
        this.setState({
            deadline_start: e.target.value
        })
    }

    handleDeadLineEndChange(e){
        this.setState({
            deadline_end: e.target.value
        })
    }

    handleProgressChange(e){
        this.setState({
            progress: e.target.value
        })
    }

    handleSubmit(e){
        e.preventDefault();
        console.log(this.state);

        axios.post('/cronos/store', this.state).then(response => {
            window.alert('Projeto cadastrado com sucesso.')
        }).catch(error => {
            window.alert('Algo deu errado, por favor tente novamente.')
            console.log(error)
        })
    }

    render() {
        return (

            <form method="post" onSubmit={this.handleSubmit.bind(this)}>
                <div className="form-group">
                    <label htmlFor="name">Nome</label><br/>
                    <input type="text" placeholder="Nome" name="name" value={this.state.name} onChange={this.handleNameChange.bind(this)}/>
                </div>
                <div className="form-group">
                    <label htmlFor="sku">Deadline Start</label><br/>
                    <input type="text" placeholder="Deadline Start" name="deadline_start" value={this.state.deadline_start} onChange={this.handleDeadLineStartChange.bind(this)}/>
                </div>
                <div className="form-group">
                    <label htmlFor="sku">Deadline End</label><br/>
                    <input type="text" placeholder="Deadline End" name="deadline_end" value={this.state.deadline_end} onChange={this.handleDeadLineEndChange.bind(this)}/>
                </div>
                <div className="form-group">
                    <label htmlFor="sku">Progress</label><br/>
                    <input type="text" placeholder="Progress" name="progress" value={this.state.progress} onChange={this.handleProgressChange.bind(this)}/>
                </div>
                <button className="btn btn-dark" type="submit">Create</button>
            </form>
        );
    }
}

if (document.getElementById('create')) {
    ReactDOM.render(<Create />, document.getElementById('create'));
}