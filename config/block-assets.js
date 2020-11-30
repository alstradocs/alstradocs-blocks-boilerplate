const glob = require('glob');
const path = require("path");

const dynamicCssFiles = () => glob
    .sync('blocks/**/frontend.scss')
    .reduce((cssEntries, cssEntryLocation) => {
        const newCssEntries = { ...cssEntries };
        const dynamicCssEntry = cssEntryLocation.replace(
            '/frontend.scss',
            '-styles',
        );
        newCssEntries[dynamicCssEntry] = cssEntryLocation;
        return newCssEntries;
    }, {});

const dynamicJsFiles = () => glob.sync('src/blocks/**/script.ts').reduce((jsEntries, jsEntryPath) => {
    const newJsEntries = { ...jsEntries };
    let dynamicJsEntry = jsEntryPath.replace('/script.ts', '-scripts');
    let entryTokens = dynamicJsEntry.split('/');

    if(entryTokens.length > 0) {
        let blockEntryPointName = 'blocks/' + entryTokens[entryTokens.length - 1];
        newJsEntries[blockEntryPointName] = path.resolve('./', jsEntryPath.replace('/script.ts', ''), "index.tsx");
    }
    return newJsEntries;
}, {});

module.exports = {
    dynamicCssFiles,
    dynamicJsFiles,
};