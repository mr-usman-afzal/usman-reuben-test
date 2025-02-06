export function useSavedArticles() {
    function getSavedArticles() {
        const data = localStorage.getItem("savedArticles") || "[]";
        return JSON.parse(data);
    }

    return { getSavedArticles };
}
