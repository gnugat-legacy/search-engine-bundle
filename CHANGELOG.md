# Changes between versions

## 0.2.0: FilteringBuilderStrategy tag

* added support of a `gnugat_search_engine.filtering_builder_strategy` tag to be able to register `FilteringBuilderStrategies`

Works with SearchEngine v0.2

## 0.1.0: Proof Of Concept

* defined the following services:
    * `gnugat_search_engine.criteria_factory`: creates `Criteria` from Request query parameters
    * `gnugat_search_engine.identifier_engine`: an instance of `IdentifierEngine`
    * `gnugat_search_engine.search_engine`: an instance of `SearchEngine`
* added support of a `gnugat_search_engine.select_builder` tag to be able to register `SelectBuidlers`

Works with SearchEngine v0.2
