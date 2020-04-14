import { useEffect, useState } from "react";

function getClassFromType(type) 
{
    switch(type) {
        case 'info':
            return 'is-info';
        case 'success':
            return 'is-success';
        case 'danger':
            return 'is-danger';  
    }
}
export default function Message(props) 
{
    const [className, setClassName] = useState(null);
    const [display, setDisplay] = useState(false)
    
    function displayMessage() {
        console.log('create the message');
        setClassName(getClassFromType(props.message.type));
        setDisplay(true)
        setTimeout(() => {
            setDisplay(false);
        }, 5000);
    }

    useEffect(() => {
        displayMessage();
    }, []);

    function handleClick() { setDisplay(false); }

    return (
        <>
            {display &&
            <div className="container">
                <div className={`notification ${className}`}>
                    <button onClick={handleClick} className="delete"></button>
                    {props.message.text}
                </div>
            </div>}
        </>
    );
}