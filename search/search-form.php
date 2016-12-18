<?php echo $this->form('search-form', $options['form_attributes']); ?>
    <div class="input-group">
        <?php echo $this->formText('query', $filters['query'], array(
            'title' => __('Search'),
            'class' => 'input-medium search-query form-control',
            'placeholder' => __('Search'),
        )); ?>
        <span class="input-group-btn">
            <?php echo $this->formButton('submit_search', $options['submit_value'], array(
                'type' => 'submit',
                'class' => 'btn btn-default',
                'content' => '<span class="glyphicon glyphicon-search"></span>',
                'escape' => false,
            )); ?>
    <?php if ($options['show_advanced']): ?>
            <a href="#" id="show-advanced" class="show-advanced button btn btn-default" role="button" tabindex="0">
                <span class="glyphicon glyphicon-plus"></span>
            </a>
        </span>
    </div>
    <div id="advanced-form">
        <fieldset id="query-types">
            <legend><?php echo __('Search using this query type:'); ?></legend>
            <?php echo $this->formRadio('query_type', $filters['query_type'], null, $query_types); ?>
        </fieldset>
        <?php if ($record_types): ?>
        <fieldset id="record-types">
            <legend><?php echo __('Search only these record types:'); ?></legend>
            <?php foreach ($record_types as $key => $value): ?>
            <?php echo $this->formCheckbox('record_types[]', $key, array('checked' => in_array($key, $filters['record_types']), 'id' => 'record_types-' . $key)); ?> <?php echo $this->formLabel('record_types-' . $key, $value);?><br />
            <?php endforeach; ?>
        </fieldset>
        <?php elseif (is_admin_theme()): ?>
            <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
        <?php endif; ?>
        <p><?php echo link_to_item_search(__('Advanced Search (Items only)')); ?></p>
    </div>
    <?php else: ?>
        </span>
    </div>
        <?php echo $this->formHidden('query_type', $filters['query_type']); ?>
        <?php foreach ($filters['record_types'] as $type): ?>
        <?php echo $this->formHidden('record_types[]', $type); ?>
        <?php endforeach; ?>
    <?php endif; ?>
</form>
