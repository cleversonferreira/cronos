import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Projects extends Component {

    constructor(){
        super();
        this.state = {
            data: []
        }
    }

    componentWillMount(){
        let $this = this;

        axios.get('/cronos/all').then(response => {
            $this.setState({
                data: response.data
            })
        }).catch(error => {
            console.log(error)
        })
    }

    render() {
        return (

            <table className="table table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                {this.state.data.map((cronos, i) => (
                        <ProjectRow key={i} i={i} cronos={cronos} object={this} />
                    )
                )}
                </tbody>
            </table>
        );
    }
}

class ProjectRow extends React.Component{

    deleteProject(cronos, object){
        let $this = object

        axios.get('/cronos/delete/' + cronos.id).then(response => {
            console.log(response)

            const newState = $this.state.data.slice();
            newState.splice(newState.indexOf(cronos), 1)

            $this.setState({
                data: newState
            })
        }).catch(error => {
            console.log(error)
        })
    }

    render(){
        return(
            <tr key={this.props.i}>
                <th>{this.props.cronos.id}</th>
                <th>{this.props.cronos.name}</th>
                <th>{this.props.cronos.deadline_end}</th>
                <th>{this.props.cronos.progress}%</th>
                <th>
                    <a href={'/countdown/' + this.props.cronos.id}>view</a> |
                    <a href={'/cronos/edit/' + this.props.cronos.id}>edit</a> |
                    <a href="javascript:" onClick={this.deleteProject.bind(this, this.props.cronos, this.props.object)}>delete</a>
                </th>
            </tr>
        )
    }
}

if (document.getElementById('projects')) {
    ReactDOM.render(<Projects />, document.getElementById('projects'));
}
