import { useEffect } from "react";

const Welcome = () => {
    useEffect(() => {
        console.log("Welcome Page mounted");
    }, []);

    return <h1 className="text-3xl font-bold underline"> Welcome Inertia.js</h1>;
};

export default Welcome;